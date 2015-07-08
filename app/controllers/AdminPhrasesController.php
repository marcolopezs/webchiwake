<?php

use Chiwake\Repositories\BaseRepo;
use Chiwake\Entities\Phrase;
use Chiwake\Repositories\PhraseRepo;

class AdminPhrasesController extends \BaseController {

    protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'required|min:10|max:255',
        'autor' => '',
        'publicar' => 'required|in:1,0'
    ];

    protected $phraseRepo;

    public function __construct(PhraseRepo $phraseRepo)
    {
        $this->phraseRepo = $phraseRepo;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
        $posts = Phrase::orderBy('titulo', 'asc')->paginate();
        return View::make('admin.phrases.list', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.phrases.create');
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
            //VARIABLES
            $titulo = Input::get('titulo');
            $descripcion = Input::get('descripcion');
            $autor = Input::get('autor');

            //GUARDAR DATOS
            $post = new Phrase($data);
            $this->phraseRepo->create($post, $data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.phrases.index');
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
        $post = $this->phraseRepo->findOrFail($id);

        return View::make('admin.phrases.show', compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->phraseRepo->findOrFail($id);

        return View::make('admin.phrases.edit', compact('post'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $post = $this->phraseRepo->findOrFail($id);

        $data = Input::only(['titulo','descripcion','autor','publicar']);

        $validator = Validator::make($data, $this->rules);

        if($validator->passes())
        {
            //VARIABLES
            $titulo = Input::get('titulo');
            $descripcion = Input::get('descripcion');
            $autor = Input::get('autor');
            
            //GUARDAR DATOS
            $this->phraseRepo->update($post,$data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.phrases.index');
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