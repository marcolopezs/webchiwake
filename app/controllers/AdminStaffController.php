<?php

use Chiwake\Repositories\BaseRepo;
use Chiwake\Entities\Staff;
use Chiwake\Repositories\StaffRepo;

class AdminStaffController extends \BaseController {

    protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'required|min:10|max:255',
        'precio' => 'required',
        'imagen' => 'mimes:jpeg,jpg,png',
        'categoria' => '',
        'publicar' => 'required|in:1,0'
    ];

    protected $staffRepo;

    public function __construct(StaffRepo $staffRepo)
    {
        $this->staffRepo = $staffRepo;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
        $posts = $this->staffRepo->search(Input::all(), BaseRepo::PAGINATE, 'nombre', 'asc');
        return View::make('admin.staff.list', compact('posts', 'category'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.staff.create');
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
            $this->staffRepo->create($post, $data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.staff.index');
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
        $post = $this->staffRepo->findOrFail($id);

        return View::make('admin.staff.show', compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->staffRepo->findOrFail($id);
        $category = $this->menuCategoryRepo->all()->lists('titulo', 'id');

        $tags = $this->tagRepo->all();
        $tags_select = $post->tags;
        $tags_select = explode(",", $tags_select);
        $tags_select = $this->tagRepo->findOrFail($tags_select);

        return View::make('admin.staff.edit', compact('post', 'category', 'tags', 'tags_select'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $post = $this->staffRepo->findOrFail($id);

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
            $this->staffRepo->update($post,$data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.staff.index');
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