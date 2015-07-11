<?php

use Chiwake\Repositories\BaseRepo;
use Chiwake\Entities\Menu;
use Chiwake\Entities\MenuCategory;
use Chiwake\Repositories\MenuCategoryRepo;
use Chiwake\Repositories\MenuRepo;

class AdminMenusController extends \BaseController {

    protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'required|min:10|max:255',
        'precio' => 'required',
        'imagen' => 'mimes:jpeg,jpg,png',
        'categoria' => '',
        'publicar' => 'required|in:1,0'
    ];

    protected $menuCategoryRepo;
    protected $menuRepo;

    public function __construct(MenuCategoryRepo $menuCategoryRepo,
                                MenuRepo $menuRepo)
    {
        $this->menuCategoryRepo = $menuCategoryRepo;
        $this->menuRepo = $menuRepo;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index($category)
    {
        $posts = Menu::whereMenuCategoryId($category)->orderBy('titulo', 'asc')->paginate();
        $category = $this->menuCategoryRepo->findOrFail($category);
        
        return View::make('admin.menus.list', compact('posts', 'category'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($category)
    {
        $category = $this->menuCategoryRepo->findOrFail($category);
        
        return View::make('admin.menus.create', compact('category'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($category)
    {
        $data = Input::all();

        $validator = Validator::make($data, $this->rules);

        if($validator->passes())
        {
            //CREAR CARPETA CON FECHA Y MOVER IMAGEN
            CrearCarpeta();
            $ruta = "upload/".FechaCarpeta();
            $ruta_fecha = FechaCarpeta();
            $archivo = Input::file('imagen');
            $file = FileMove($archivo,$ruta);

            //VARIABLES
            $titulo = Input::get('titulo');

            //CONVERTIR TITULO A URL$union_tags
            $slug_url = \Str::slug($titulo);

            //GUARDAR DATOS
            $post = new Menu($data);
            $post->slug_url = $slug_url;
            $post->menu_category_id = $category;
            $post->imagen = $file;
            $post->imagen_carpeta = $ruta_fecha;
            $post->user_id = Auth::user()->id;
            $this->menuRepo->create($post, $data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.menus.index', $category);
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = $this->menuRepo->findOrFail($id);

        return View::make('admin.menus.show', compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($category, $id)
    {
        $post = Menu::findOrFail($id);

        return View::make('admin.menus.edit', compact('post', 'category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($category, $id)
    {
        $post = $this->menuRepo->findOrFail($id);

        $data = Input::only(['titulo','descripcion','precio','publicar']);

        $validator = Validator::make($data, $this->rules);

        if($validator->passes())
        {
            //VARIABLES
            $titulo = Input::get('titulo');

            //CONVERTIR TITULO A URL
            $slug_url = \Str::slug($titulo);

            //VERIFICAR SI SUBIO IMAGEN
            if(Input::hasFile('imagen')){
                CrearCarpeta();
                $ruta = "upload/".FechaCarpeta();
                $archivo = Input::file('imagen');
                $file = FileMove($archivo,$ruta);
                $imagen = $file;
                $imagen_carpeta = FechaCarpeta();
            }else{
                $imagen = Input::get('imagen_actual');
                $imagen_carpeta = Input::get('imagen_actual_carpeta');
            }

            //GUARDAR DATOS
            $post->imagen = $imagen;
            $post->imagen_carpeta = $imagen_carpeta;
            $post->menu_category_id = $category;
            $post->slug_url = $slug_url;
            $post->user_id = Auth::user()->id;
            $this->menuRepo->update($post,$data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.menus.index', $category);
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($category, $id)
    {
        $post = Menu::find($id);
        $post->delete();

        $message = 'El registro se eliminó satisfactoriamente.';

        if(Request::ajax())
        {
            return Response::json([
                'message' => $message
            ]);
        }

        return Redirect::route('administrador.menus.index', $category);
    }

}