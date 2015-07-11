<?php

use Chiwake\Entities\About;
use Chiwake\Repositories\AboutRepo;

class AdminAboutController extends \BaseController {

	protected $aboutRepo;
	protected $id = 1;

    public function __construct(AboutRepo $aboutRepo)
    {
        $this->aboutRepo = $aboutRepo;
    }

	public function nosotros()
	{
		$post = $this->aboutRepo->findOrFail($this->id);

		return View::make('admin.about.nosotros', compact('post'));
	}

	public function nosotrosUpdate()
	{
		$post = $this->aboutRepo->findOrFail($this->id);

		$rules = [
	        'contenido' => 'required',
	        'imagen' => 'mimes:jpeg,jpg,png',
	    ];

		$data = Input::only(['contenido','imagen']);

        $validator = Validator::make($data, $rules);

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

            //VARIABLES
            $contenido = Input::get('contenido');

            //GUARDAR DATOS
            $post->about = $contenido;
            $post->about_imagen = $imagen;
            $post->about_imagen_carpeta = $imagen_carpeta;
            $this->aboutRepo->update($post, $data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.about.nosotros');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
	}


	public function misvis()
	{
		$post = $this->aboutRepo->findOrFail($this->id);

		return View::make('admin.about.misvis', compact('post'));
	}

	public function misvisUpdate()
	{
		$post = $this->aboutRepo->findOrFail($this->id);

		$rules = [
	        'mision_contenido' => 'required',
	        'vision_contenido' => 'required',
	        'imagen' => 'mimes:jpeg,jpg,png',
	    ];

		$data = Input::only(['mision_contenido','vision_contenido','imagen']);

        $validator = Validator::make($data, $rules);

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

            //VARIABLES
            $mision_contenido = Input::get('mision_contenido');
            $vision_contenido = Input::get('vision_contenido');

            //GUARDAR DATOS
            $post->mision = $mision_contenido;
            $post->vision = $vision_contenido;
            $post->misvis_imagen = $imagen;
            $post->misvis_imagen_carpeta = $imagen_carpeta;
            $this->aboutRepo->update($post, $data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.about.misvis');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
	}


}
