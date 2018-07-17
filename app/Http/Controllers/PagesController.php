<?php

namespace App\Http\Controllers;


use App\Http\Requests;

use Illuminate\Http\Request;

use App\Http\Requests\CreateMessageRequest;



class PagesController extends Controller
{


    public function __construct()
    {
    	$this->middleware('example', ['only'=>['home']]);

    }

    public function home()
    {
    	/*return response('Contenido de la respuesta',201, ['X-TOKEN' => 'Secretos']);
    	
    	//Otra sintáxis con varios headers:  
    	return response('Contenido de la respuesta',201)
    					->header('X-TOKEN', 'Secretos')
    					->header('X-TOKEN2', 'Mauricio-2')
    					->cookie('X-COOKIE', 'Galleta');

    	return "Home";	//Un String se muestra como HTML
    	return ['key' =>['Value1', 'Value2']]; 	//Un Array se muestra como una respuesta tipo Json*/
    	return view('home');
    }

    public function saludo($nombre = 'Invitado')
    {
        //$html = "<h2>Contenido html</h2>"
        //$script = "<script>alert('Problemas XSS - Cross Site Scripting!') </stript>"
		$consolas = [
			"Play Station 4",
			"Xbox One",
			"Wii U"
		];
    	return view('saludos', compact('nombre', 'consolas'));
    }




    public function contact()
    {
        return view('messages.create');
    }


    /* METODOS INNECESARIOS (eliminados conscientemente):

        public function mensajes(CreateMessageRequest $request)
        {
            return $request->all();   //Muestra los datos insertados en los campos

            if ($request->filled('nombre')) {
                return "Tiene nombre. Y es: <h2>" . $request->input('nombre') . "</h2>";
            }

            return "No tiene nombre";
            

            $this->validate($request, [
                'nombre' => 'required',
                'email' => 'required|email',    // Es equivalente: 'email' => ['required' ,'email']
                'mensaje' => 'required|min:5'
                 ]);
            // return $request->all();

                 $data = $request->all();

                 //return redirect()
                 //->route('contactos')
                 //->with('info', 'Tu mensaje ha sido enviado correctamente :)');
                 //return back()->with('info', 'Tu mensaje ha sido enviado correctamente :)');
        }
    */

}
