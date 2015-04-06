<?php

use Chiwake\Repositories\BaseRepo;
use Chiwake\Entities\Menu;
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
    public function index()
    {
        $posts = $this->menuRepo->search(Input::all(), BaseRepo::PAGINATE, 'published_at', 'desc');
        $category = $this->menuCategoryRepo->lists('titulo', 'id');
        return View::make('admin.menus.list', compact('posts', 'category'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $category = $this->menuCategoryRepo->all()->lists('titulo', 'id');
        $selected = [];
        return View::make('admin.menus.create', compact('category', 'selected'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
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
            $categoria = Input::get('categoria');

            //CONVERTIR TITULO A URL$union_tags
            $slug_url = \Str::slug($titulo);

            //GUARDAR DATOS
            $post = new Menu($data);
            $post->slug_url = $slug_url;
            $post->menu_category_id = $categoria;
            $post->imagen = $file;
            $post->imagen_carpeta = $ruta_fecha;
            $post->user_id = Auth::user()->id;
            $this->menuRepo->create($post, $data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.menus.index');
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
    public function edit($id)
    {
        $post = $this->menuRepo->findOrFail($id);
        $category = $this->menuCategoryRepo->all()->lists('titulo', 'id');

        $tags = $this->tagRepo->all();
        $tags_select = $post->tags;
        $tags_select = explode(",", $tags_select);
        $tags_select = $this->tagRepo->findOrFail($tags_select);

        return View::make('admin.menus.edit', compact('post', 'category', 'tags', 'tags_select'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $post = $this->menuRepo->findOrFail($id);

        $data = Input::only(['titulo','descripcion','contenido','published_at','publicar']);

        $validator = Validator::make($data, $this->rules);

        if($validator->passes())
        {
            //VARIABLES
            $titulo = Input::get('titulo');
            $video = Input::get('video');
            $categoria = Input::get('categoria');

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

            //TAGS
            $tags=Input::get('tags');
            if($tags==""){ $union_tags=0; }
            elseif($tags<>""){ $union_tags=implode(",", $tags);}

            //GUARDAR DATOS
            $post->imagen = $imagen;
            $post->imagen_carpeta = $imagen_carpeta;
            $post->video = $video;
            $post->category_id = $categoria;
            $post->tags = '0,'.$union_tags.',0';
            $post->slug_url = $slug_url;
            $post->user_id = Auth::user()->id;
            $this->menuRepo->update($post,$data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.menus.index');
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
    public function destroy($id)
    {
        //
    }

}