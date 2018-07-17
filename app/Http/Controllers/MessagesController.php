<?php

namespace App\Http\Controllers;

use DB;
use App\Message;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    function __construct()
    {
        $this->middleware('auth',['except' => ['create','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    /*    //QUERY BUILDER:
        //Nos trae todos los registros que tenemos en la Base y los guarda en la variable "$mensajes_BD"
        $mensajes_BD = DB::table('messages')->get();
    */

        //ELOCUENT:
        $mensajes = Message::all();

        //Retorna la vista "index.blade.php" que está en la carpeta "messages" y envía la variable "$mensajes_BD"
        return view('messages.index', compact('mensajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        //return $request->input('nombre');

       /*  //Guardar (Query Builder): 
        DB::table('messages')->insert([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "telefono" => $request->input('telefono'),
            "mensaje" => $request->input('mensaje'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);*/

        //ELOCUENT:
        $message = Message::create($request->all());

        if(auth()->check())
        {
            auth()->user()->messages()->save($message);
        }

        //redireccionar:
        return redirect()->route('messages.create')->with('info','Hemos recibido tu mensaje');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$message = DB::table('messages')->where('id', $id)->first();

        //ELOCUENT:
        $mensaje = Message::findOrFail($id);

        return view('messages.show',compact('mensaje'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* QUERY BUILDER:
        $message = DB::table('messages')->where('id', $id)->first();
        */

        //ELOCUENT:
        $dato = Message::findOrFail($id);

        return view('messages.edit', compact('dato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /* //Actualizamos con QUERY BUILDER:
        DB::table('messages')->where('id', $id)->update([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "telefono" => $request->input('telefono'),
            "mensaje" => $request->input('mensaje'),
            "updated_at" => Carbon::now(),
        ]);
        */

        /* En ELOCUENT lo podemos hacer de 2 formas:
        
        //La primera forma es, primero buscar el mensaje a través del ID
            $message = Message::findOrFail($id);

        //Y luego lo actualizamos:
            $message->update($request->all());*/

        //La segunda forma es en una sola línea:
        Message::findOrFail($id)->update($request->all());

        //Redireccionamos

        return redirect()->route('messages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* Eliminar mensaje con el QUERY BUILDER:
        DB::table('messages')->where('id', $id)->delete();
        */

        //ELOCUENT:
        Message::findOrFail($id)->delete();

        //Redireccionar
        return redirect()->route('messages.index');
    }
}
