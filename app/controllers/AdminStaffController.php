<?php

use Chiwake\Repositories\BaseRepo;
use Chiwake\Entities\Staff;
use Chiwake\Repositories\StaffRepo;

class AdminStaffController extends \BaseController {

    protected $rules = [
        'nombre' => 'required',
        'cargo' => 'required',
        'descripcion' => 'required|min:10|max:255',
        'imagen' => 'mimes:jpeg,jpg,png',
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
        $posts = $this->staffRepo->search(Input::all(), BaseRepo::PAGINATE, 'orden', 'asc');
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
            $archivo = Input::file('imagen');
            $imagen = FileMove($archivo,$ruta);
            $imagen_carpeta = FechaCarpeta();

            //GUARDAR DATOS
            $post = new Staff($data);
            $post->imagen = $imagen;
            $post->imagen_carpeta = $imagen_carpeta;
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

        return View::make('admin.staff.edit', compact('post'));
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

        $data = Input::only(['nombre','cargo','descripcion','imagen','publicar']);

        $validator = Validator::make($data, $this->rules);

        if($validator->passes())
        {
            //VERIFICAR SI SUBIO IMAGEN
            if(Input::hasFile('imagen')){
                CrearCarpeta();
                $ruta = "upload/".FechaCarpeta();
                $archivo = Input::file('imagen');
                $imagen = FileMove($archivo,$ruta);
                $imagen_carpeta = FechaCarpeta();
            }else{
                $imagen = Input::get('imagen_actual');
                $imagen_carpeta = Input::get('imagen_actual_carpeta');
            }

            //GUARDAR DATOS
            $post->imagen = $imagen;
            $post->imagen_carpeta = $imagen_carpeta;
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
        $post = Staff::find($id);
        $post->delete();       

        $message = 'El registro se eliminó satisfactoriamente.';

        if(Request::ajax())
        {
            return Response::json([
                'message' => $message
            ]);
        }

        return Redirect::route('administrador.posts.index');
    }


    public function order()
    {
        $photos = Staff::orderBy('orden', 'asc')->get();
        return View::make('admin.staff.order', compact('photos'));
    }

    public function orderForm()
    {
        if(Request::ajax())
        {
            $sortedval = $_POST['listPhoto'];
            try{
                foreach ($sortedval as $key => $sort){
                    $sortPhoto = Staff::find($sort);
                    $sortPhoto->orden = $key;
                    $sortPhoto->save();
                }
            }
            catch (Exception $e)
            {
                return 'false';
            }
        }
    }

}