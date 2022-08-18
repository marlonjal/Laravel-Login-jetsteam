<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\view;

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

Route::get('/', function () {
    return view('welcome');
});


//ejemplo 1 regresando texto
Route:: get('/texto', function(){
     return '<h1>esto es texto de prueba</h1>';
});

//ejemplo 2 array
Route:: get('/arreglo', function(){
    $arreglo = ['lunes', 'martes', 'miercoles' ];
    return $arreglo;
});

//ejemplo 3 arreglo asociativo

Route:: get('/arreglo1', function(){
    $arreglo = ['Id'=> '1', 
                'Desripcion' => 'Producto 1'
];
    return $arreglo;
});

//ejemplo 4 parametro
Route:: get('/nombre/{nombre} ', function($nombre){
    
    return '<h1> El nombre es: '.$nombre.'</h1>';
});

//ejemplo 5 parametro default
Route:: get('/cliente/{cliente} ', function($cliente='cliente general'){
    
    return '<h1> El nombre es: '.$cliente.'</h1>';
});


//ejemplo redireccion de ruta
Route:: get('/ruta1', function(){
    return '<h1>vista de la ruta 1</h1>';
})->name('rutaNro1');


Route:: get('/ruta2', function(){
    // return '<h1>esta es la vista de la ruta 2</h1>';
    return redirect()->route('rutaNro1');
})->name('rutaNro2');


Route:: get('/ruta3', function(){
    return redirect()->route('rutaNro2');
})->name('rutaNro3');

//ejemplo 7 poner parametro solo numero o letra
Route::get('/usuarionumero/{usuarionumero}', function ($usuarionumero) {
    return 'El usuario es: '.$usuarionumero;
})->where('usuario', '[0-9]+');

Route::get('/usuarioletra/{usuarioletra}', function ($usuarioletra) {
    return 'El usuario es: '.$usuarioletra;
})->where('usuario', '[A-Za-z]+' );


Route::get('/', 'App\Http\Controllers\InicioController@index');

//ejemplo vista
/*
if ( view :: exists('vista2')){
    Route::get('/', function () {
        return view('vista2');
    });
}else{
    Route::get('/', function () {
        return view('La vista solicitada no existe puto');
    });
}*/








 
//--------------------------------------------------
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
