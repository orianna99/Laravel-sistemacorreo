<?php

use App\User;

use App\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

//Rutas de Autenticación
Auth::routes();

//Correo 
Route::resource('/mail', 'Panel\MailController')->middleware('auth','status');

Route::post('/sendmail/image','Api\MailController@upload');
Route::post('/sendmail','Api\MailController@store');
//Enviar el correo
Route::post('/template',"Api\TemplateController@store");

//Obetner las plantillas
Route::get('/template/index',"Api\TemplateController@index");

Route::get('/usuarios', function () {
    $users = User::all();
    return view('panel.users',['users'=>$users]);
})->name('usuarios');

Route::put('usuarios', function (Request $request) {

    $user =User::find($request->user_id);
    if ($user->activo == 'YES') {
        $user->activo = 'NO';
        $user->save();
        return redirect()->route('usuarios')->with('status','Usuario '.$user->email.' Desactivado!');
    }else {
        $user->activo = 'YES';
        $user->save();
        return redirect()->route('usuarios')->with('status','Usuario '.$user->email.' Activado!');
    }



})->name('disable.user');
