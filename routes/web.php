<?php

use App\Http\Controllers\Administrador\Home\homeController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\resetPassword;
use App\Http\Controllers\Desarrollo\Divisas\divisasController;
use App\Http\Controllers\Desarrollo\FasesPlaneacion\fasesController;
use App\Http\Controllers\Desarrollo\Ot\ordenController;
use App\Http\Controllers\Auth\forgotPassword;
use App\Http\Controllers\Desarrollo\Foros\Contenido\contenidoController;
use App\Http\Controllers\Desarrollo\Foros\CreacionTareas\tareaController;
use App\Http\Controllers\Desarrollo\Foros\Cuentas\cuentasController;
use App\Http\Controllers\Desarrollo\Foros\Desarrollo\desarrolloController;
use App\Http\Controllers\Desarrollo\Foros\DigitalPerformance\digitalController;
use App\Http\Controllers\Desarrollo\Foros\Diseño\diseñoController;
use App\Http\Controllers\Desarrollo\Foros\TraficoTareas\traficoController;
use App\Http\Controllers\Desarrollo\Usuarios\usersHimalayaController;
use App\Http\Controllers\generalController;
use App\Http\Controllers\Desarrollo\Roles\rolesController;
use App\Http\Controllers\fakeDataController;
use App\Http\Controllers\Desarrollo\Clientes\clientesController;
use App\Http\Middleware\DisableCache;
use App\Http\Middleware\Guest;
use App\Http\Middleware\RememberMe;
use App\Models\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

Route::middleware(Guest::class, DisableCache::class)->group(function () {
    Route::get('/', [loginController::class, 'showLogin'])->name('login');
    Route::get('/login', [loginController::class, 'showLogin'])->name('Iniciar sesión');
    Route::post('/credentialsUser', [loginController::class, 'login'])->name('login.user.credentials');
    Route::get('/ResetPassword', [resetPassword::class, 'showResetPassword'])->name('Restablecer contraseña');
    Route::post('/storeRestorePassword', [resetPassword::class, 'storeResetPassword'])->name('store.reset.password');
    Route::get('/forgotPassword', [forgotPassword::class, 'index'])->name('¿Olvidó su contraseña?');
    Route::post('/storeForgotPassword', [forgotPassword::class, 'store'])->name('store.forgot.password');
});


Route::post('logout', function (Request $request) {

    Auth::logout();

    Session::invalidate();

    Session::regenerateToken();

    return redirect('/')->with('status', 'Sesión cerrada de forma segura.');

})->name('logout');


Route::middleware(['auth', DisableCache::class, RememberMe::class])->prefix('superadmin')->group(function () {


        Route::get('/home', [generalController::class, 'homeDevelopment'])->name('Página principal');
        Route::get('/profileDevelopment/{id}', [generalController::class, 'showProfileUser'])->name('Perfil');
        Route::put('/update-image', [generalController::class, 'updateImage'])->name('image.update');

        // Controladores OTS SuperAdministrador


        Route::controller(ordenController::class)->group(function(){

            Route::get('/listOt', 'index')->name('Listado de ordenes');
            Route::get('/apiOts','getOts')->name('api.ots');
            Route::get('/createOt',  'create')->name('Crear orden de trabajo');
            Route::post('/store.create.ot','store')->name('store.create.ot');
            Route::get('/descargar-excel','downloadExcel')->name('descargar.excel');

        });


    // Controladores FasesPlaneación SuperAdministrador

        Route::controller(fasesController::class)->group(function(){

            Route::get('/fasesPlaneacion','index')->name('Fase del proyecto');
            Route::get('/createPlaneacion',  'create')->name('Crear fase de planeación');
            Route::post('/storePlaneacion', 'store')->name('store.fase.planeacion');
            Route::get('/editFasePlaneacion/{id}','edit')->name('Actualizar fase de pleanación');
            Route::put('/updateFasePlaneacion/{id}', 'update')->name('update.fase.planeación');

        });

    // Controladores Divisas SuperAdministrador

        Route::controller(divisasController::class)->group(function(){

            Route::get('/divisasDevelopment','index')->name('Divisas');
            Route::get('/createDevelopment','create')->name('Crear divisa');
            Route::post('/storeDivisaDevelopment','store')->name('store.divisa');
            Route::get('/editDivisa/{id}','edit')->name('Actualizar divisa');
            Route::put('/update.divisa/{id}','update')->name('update.divisa');

        });


        Route::controller(clientesController::class)->group( function(){
            Route::get('/Clientes','index')->name('Clientes');
        });

    // Controladores de usuarios SuperAdministrador

        Route::controller(usersHimalayaController::class)->group(function(){

            Route::get('/usuariosEquipo','index')->name('Usuarios');
            Route::get('/apiUser','apiUser')->name('api.user');
            Route::get('/createUser','create')->name('Registrar nuevo usuario');
            Route::get('/editUser/{id}','edit')->name('Actualizar detalles del usuario');
            Route::post('/store.create.user','store')->name('store.crete.user');
            Route::put('/updateUser/{id}')->name('edit.update.user');
            Route::put('/profileDirectory/{id}','show')->name('Perfil de usuario');
            Route::get('/directorioEquipo','profilesDirectories')->name('Directorio');

        });

    // Controladores de Roles SuperAdministrador

        Route::controller(rolesController::class)->group(function(){

            Route::get('/forumRole', 'index')->name('Roles');
            Route::get('/createRoles','create')->name('Establecer un rol');
            Route::post('/storeRoles', 'store')->name('Roles.store');
            Route::get('/editRoles/{id}',  'edit')->name('Actualizar Detalles del Rol');
            Route::put('/updateRoles/{id}',  'update')->name('update.roles');

        });

        Route::get('/forumContent', [contenidoController::class, 'index'])->name('Foro contenido');
        Route::get('/forumAccount', [cuentasController::class, 'index'])->name('Foro cuentas');
        Route::get('/forumDevelopment', [desarrolloController::class, 'index'])->name('Foro desarrollo');
        Route::get('/forumDesign', [diseñoController::class, 'index'])->name('Foro diseño');
        Route::get('/forumDigitalPerformance', [digitalController::class, 'index'])->name('Foro digital performance');
        Route::get('/traficHomeworks', [traficoController::class, 'index'])->name('Foro trafico de tareas');
        Route::get('/forumCreateHomework', [tareaController::class, 'index'])->name('Crear tarea');
        Route::get('/searchHomework', [tareaController::class, 'search'])->name('homework.search');



});

Route::middleware([DisableCache::class, 'auth'])->prefix('administrador')->group(function () {

    Route::get('/home',[homeController::class,'index'])->name('Home Administrador');

});


Route::middleware(['auth', DisableCache::class])->prefix('colaborador')->group(function () {

    Route::get('home',[homeController::class,'index'])->name('Home Colaborador');

});




//TESTING

Route::get('/test-session',function(){
    return dd(session()->all());
});


Route::get('testEmail', function () {
    return view('Mails.forgotPassword');
})->name('testEmail');

Route::get('/interface-restore',function(){
    return view('login.restorePassword');
});

//ERRORS VIEWS

Route::get('400', function () {
    return view('errors.400');
})->name('400');

Route::get('404', function () {
    return view('errors.404');
})->name('404');

Route::get('403', function () {
    return view('errors.403');
})->name('403');

Route::get('419', function () {
    return view('errors.419');
})->name('419');

Route::get('500', function () {
    return view('errors.500');
})->name('500');

Route::get('503', function () {
    return view('errors.503');
})->name('503');


//View Faker

Route::get('setFakeComentarios',[fakeDataController::class,'setFakeComentarios'])->name('fakerComentario');
Route::get('setFakeTareas',[fakeDataController::class,'setFakeTareas'])->name('fakerTareas');
Route::get('setFakeTraficoTareas',[fakeDataController::class,'setFakeTraficoTareas'])->name('fakerTrafico');
