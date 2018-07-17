<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/


//Route::get('/contactos', ['as' => 'contactos', 'uses' => 'PagesController@contact']);

//Route::post('contactos', 'PagesController@mensajes');

//SOLO PARA CREAR UN USUARIO EN LA TABLA USERS (Dos formas):
/*Route::get('test', function(){
    $user = new App\user;
    $user->name = 'Raul';
    $user->email = 'raul@local.com';
    $user->password = bcrypt('123123');
    $user->save();

    return $user;
}); 

App\User::create([
    'name' => 'Alejandra Meléndez',
    'email' => 'ale@local.com',
    'password' => bcrypt('123123'),
    'role_id' => '3'
]); */


//Route::get('roles', function(){ return \App\Role::with('user')->get(); }); solo para ver los roles

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home'])->middleware('example');

Route::get('/saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PagesController@saludo'])->where('nombre', "[A-Za-z]+");

// Con esta línea nos ahorramos las RUTAS INDIVIDUALES HACIA LOS CONTROLLERS
Route::resource('messages', 'MessagesController');

Route::resource('usuarios', 'UsersController');

Route::get('login', 'Auth\LoginController@showLoginForm');

Route::post('login', 'Auth\LoginController@login');

Route::get('logout', 'Auth\LoginController@logout');





//RUTAS INDIVIDUALES HACIA EL CONTROLLERS MessagesController:

/* Route::get('messages/create', ['as'=>'messages.create', 'uses' =>'MessagesController@create']);

Route::post('messages', ['as'=>'messages.store', 'uses' =>'MessagesController@store']);

Route::get('messages', ['as'=>'messages.index', 'uses' =>'MessagesController@index']);

Route::get('messages/{id}', ['as'=>'messages.show', 'uses' =>'MessagesController@show']);

Route::get('messages/{id}/edit', ['as'=>'messages.edit', 'uses' =>'MessagesController@edit']);

Route::put('messages/{id}', ['as'=>'messages.update', 'uses' =>'MessagesController@update']);

Route::delete('messages/{id}', ['as'=>'messages.destroy', 'uses' =>'MessagesController@destroy']);
*/



/*	RUTAS TRADICIONALES

Route::get('/', ['as' => 'home', function(){
    return view('home');
}]);

Route::get('/contactos', ['as' => 'contactos', function() {
    return view('contactos');
}]);


// Segunda Opción de "contactos"
Route::get('contactame', ['as' => 'contactos', function() {
    return "Sección de Contactos";
}]);


Route::get('/saludos/{nombre?}', ['as' => 'saludos', function($nombre = "Invitado"){
    //return view('saludos', ['nombre' =>$nombre]);			//Opciones diferentes
    //return view('saludos')->with(['nombre' =>$nombre]);	//para hacer lo mismo
    return view('saludos', compact('nombre'));
}])->where('nombre', "[A-Za-z]+");


*/


/*
Route::get('/', function(){
	return "<b>Hola desde el home</b>";
});

Route::get('/contacto', function(){
	return "<h1>Hola desde la pagina de Contacto</h1>";
});


Route::get('user/{nombre}', function ($nombre) {
    return '<h2>Hola '.$nombre . ' bienvenido nuevamente a Laravel </h2>';
});

Route::get('user/{nombre}', function ($nombre) {
    return '<h2>Hola '.$nombre . ' bienvenido nuevamente a Laravel </h2>';
});

Route::get('usuario/{nombre}/edad/{edad}', function ($nombre, $edad) {
    return '<h1>Yo soy '.$nombre . ' y tengo ' .$edad . ' años de edad.</h1>';
});

Route::get('name/{nombre?}', function ($nombre = 'Elisa') {
    return '<h2>Hola '.$nombre . ' bienvenido nuevamente a Laravel </h2>';
});
*/