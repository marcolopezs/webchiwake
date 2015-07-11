<?php

use Chiwake\Entities\About;
use Chiwake\Entities\Phrase;
use Chiwake\Entities\Menu;
use Chiwake\Entities\MenuCategory;
use Chiwake\Entities\Staff;

class FrontendController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function home()
	{
        //FRASES
        $frases = Phrase::wherePublicar(1)->orderByRaw("RAND()")->get();

		return View::make('frontend.home', compact('frases'));
	}

    public function nosotros()
    {
        //FRASES
        $frases = Phrase::wherePublicar(1)->orderByRaw("RAND()")->get();

        //STAFF
        $staff = Staff::wherePublicar(1)->orderBy('orden', 'asc')->get();

        //QUIENES SOMOS - MISION - VISION
        $about = About::find(1);
        
        return View::make('frontend.nosotros', compact('frases', 'staff', 'about'));
    }

    public function menu()
    {
        $menus_categories = MenuCategory::wherePublicar(1)->orderBy('orden','asc')->get();
        $menus = Menu::orderBy('titulo', 'asc')->get();

        return View::make('frontend.menu', compact('menus_categories', 'menus'));
    }

    public function reservacion()
    {
        $mensaje = null;

        return View::make('frontend.reservacion', compact('mensaje'));
    }

    public function reservacionForm()
    {
        $data = [
            'nombre' => Input::get('nombre'),
            'apellidos' => Input::get('apellidos'),
            'email' => Input::get('email'),
            'telefono' => Input::get('telefono'),
            'fecha' => Input::get('fecha'),
            'hora' => Input::get('hora'),
            'personas' => Input::get('personas'),
        ];

        $rules = [
            'nombre' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'personas' => 'required|min:1|max:100'
        ];

        $validator = Validator::make($data, $rules);

        if($validator->passes())
        {
            $fromEmail = 'marco@minduck.com';
            $fromNombre = 'Marco Lopez';

            Mail::send('emails.frontend.reservacion', $data, function($message) use ($fromNombre, $fromEmail){
                $message->to($fromEmail, $fromNombre);
                $message->from($fromEmail, $fromNombre);
                $message->subject('Chiwake - Reservación');
            });

            $mensaje = '<div class="alert notification alert-success">Tu mensaje ha sido enviado.</div>';

            return View::make('frontend.reservacion', compact('mensaje'));
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
    }

    public function contacto()
    {
        $mensaje = null;
        return View::make('frontend.contacto', compact('mensaje'));
    }

    public function contactoForm()
    {
        $data = [
            'mensaje' => Input::get('mensaje'),
            'nombre' => Input::get('nombre'),
            'email' => Input::get('email')
        ];

        $rules = [
            'mensaje' => 'required',
            'nombre' => 'required',
            'email' => 'required|email'
        ];

        $validator = Validator::make($data, $rules);

        if($validator->passes())
        {
            $fromEmail = 'marco@minduck.com';
            $fromNombre = 'Marco Lopez';

            Mail::send('emails.frontend.contacto', $data, function($message) use ($fromNombre, $fromEmail){
                $message->to($fromEmail, $fromNombre);
                $message->from($fromEmail, $fromNombre);
                $message->subject('Chiwake - Contacto');
            });

            $mensaje = '<div class="alert notification alert-success">Tu mensaje ha sido enviado.</div>';

            return View::make('frontend.contacto', compact('mensaje'));
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
    }

}
