<?php

use Chiwake\Repositories\ConfigurationRepo;

class AdminConfigsController extends \BaseController {

    protected $rules = [
        'titulo' => 'required',
        'dominio' => 'required',
        'descripcion' => 'required|min:10|max:255',
        'keywords' => 'required',
        'imagen' => 'mimes:ico',
        'timezone' => 'required'
    ];

    private $configurationRepo;

    public function __construct(ConfigurationRepo $configurationRepo)
    {
        $this->configurationRepo = $configurationRepo;
    }

	/**
	 * Show the form for editing the specified adminconfig.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$config = $this->configurationRepo->findOrFail($id);

		return View::make('admin.config.edit', compact('config'));
	}

	/**
	 * Update the specified adminconfig in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $config = $this->configurationRepo->findOrFail($id);

        $data = Input::only(['titulo','dominio','descripcion','keywords','imagen','google_analytics']);

        $validator = Validator::make($data, $this->rules);

        if($validator->passes())
        {
            //VARIABLES
            $timezone = Input::get('timezone');

            //VERIFICAR SI SUBIO IMAGEN
            if(Input::hasFile('imagen')){
                CrearCarpeta();
                $ruta = "upload/";
                $archivo = Input::file('imagen');
                $file = FileMove($archivo,$ruta);
                $imagen = $file;
            }else{
                $imagen = Input::get('imagen_actual');
            }

            //GUARDAR DATOS
            $config->icon = $imagen;
            $config->fill($data);
            $config->save();

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.config.edit', 1);
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
	}

}
