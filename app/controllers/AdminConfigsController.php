<?php

use Chiwake\Repositories\ConfigurationRepo;

class AdminConfigsController extends \BaseController {

    protected $rules = [
        'titulo' => 'required',
        'dominio' => 'required',
        'descripcion' => 'required|min:10|max:255',
        'keywords' => 'required'
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

        $data = Input::only(['titulo','dominio','descripcion','keywords','google_analytics']);

        $validator = Validator::make($data, $this->rules);

        if($validator->passes())
        {
            //GUARDAR DATOS
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
