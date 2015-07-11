<?php

use Chiwake\Entities\MenuCategory;
use Chiwake\Repositories\MenuCategoryRepo;

class AdminMenuCategoriesController extends \BaseController {

    protected  $rules = [
        'titulo' => 'required',
        'publicar' => 'required|in:1,0'
    ];

    protected $menuCategoryRepo;

    public function __construct(MenuCategoryRepo $menuCategoryRepo)
    {
        $this->menuCategoryRepo = $menuCategoryRepo;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
        $categories = $this->menuCategoryRepo->orderBy('orden', 'asc');
        return View::make('admin.menus_categories.list', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.menus_categories.create');
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

            //CONVERTIR TITULO A URL
            $slug_url = \Str::slug($titulo);

            $category = new MenuCategory($data);
            $category->slug_url = $slug_url;
            $category->user_id = Auth::user()->id;
            $this->menuCategoryRepo->create($category, $data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.menus_categories.index');
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
        $category = $this->menuCategoryRepo->findOrFail($id);
        return View::make('admin.menus_categories.show', compact('category'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->menuCategoryRepo->findOrFail($id);
        return View::make('admin.menus_categories.edit', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $category = $this->menuCategoryRepo->findOrFail($id);

        $data = Input::all();

        $validator = Validator::make($data, $this->rules);

        if($validator->passes())
        {
            //VARIABLES
            $titulo = Input::get('titulo');

            //CONVERTIR TITULO A URL
            $slug_url = \Str::slug($titulo);

            //GUARDAR DATOS
            $category->slug_url = $slug_url;
            $category->user_id = Auth::user()->id;
            $this->menuCategoryRepo->update($category, $data);

            //REDIRECCIONAR A PAGINA PARA VER DATOS
            return Redirect::route('administrador.menus_categories.index');
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
        $this->menuCategoryRepo->delete($id);
        return Redirect::route('administrador.menus_categories.index');
    }


    public function order()
    {
        $photos = MenuCategory::orderBy('orden', 'asc')->get();
        return View::make('admin.menus_categories.order', compact('photos'));
    }

    public function orderForm()
    {
        if(Request::ajax())
        {
            $sortedval = $_POST['listPhoto'];
            try{
                foreach ($sortedval as $key => $sort){
                    $sortPhoto = MenuCategory::find($sort);
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