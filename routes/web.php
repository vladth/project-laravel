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
Route::get('/','WelcomeController@index', function () {
    return view('welcome');  
});
Route::post('/send', 'WelcomeController@send');

Route::group(['middleware' => ['guest']], function () {
    
    Route::get('/login','Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');

});


Route::group(['middleware' => ['auth']], function () {

    

    Route::post('/', 'Auth\LoginController@logout')->name('logout');

    Route::get('/home', 'HomeController@index');

  


    Route::group(['middleware' => ['Vendedor']], function () {
         
         Route::resource('producto', 'ProductoController');
         Route::resource('cliente', 'ClienteController');
         Route::resource('venta', 'VentaController');
         Route::get('/pdfVenta/{id}', 'VentaController@pdf')->name('venta_pdf');
         Route::resource('usuario', 'UsuarioController');
         Route::get('usuario/password', 'UsuarioController@password');
         Route::post('usuario/updatepassword', 'UsuarioController@updatepassword');

     });


    Route::group(['middleware' => ['Auxiliar']], function () {
      
      Route::resource('cuenta', 'CuentaController');
      Route::resource('asiento', 'AsientoController');
      Route::get('/pdfAsiento/{id}', 'AsientoController@pdf')->name('asiento_pdf');
      Route::resource('mayor', 'MayorController');
      Route::resource('general', 'GeneralController');
      Route::resource('usuario', 'UsuarioController');
      Route::get('usuario/password', 'UsuarioController@password');
      Route::post('usuario/updatepassword', 'UsuarioController@updatepassword');
    
    });

    Route::group(['middleware' => ['Contador']], function () {
      
      Route::resource('cuenta', 'CuentaController');
      Route::resource('asiento', 'AsientoController');
      Route::get('/pdfAsiento/{id}', 'AsientoController@pdf')->name('asiento_pdf');
      Route::resource('mayor', 'MayorController');
      Route::resource('general', 'GeneralController');
      Route::resource('categoria', 'CategoriaController');
      Route::resource('producto', 'ProductoController');
      Route::get('/listarProductoPdf', 'ProductoController@listarPdf')->name('productos_pdf');
      Route::resource('proveedor', 'ProveedorController');
      Route::resource('compra', 'CompraController'); 
      Route::get('/pdfCompra/{id}', 'CompraController@pdf')->name('compra_pdf');
      Route::resource('venta', 'VentaController');
      Route::resource('factura', 'FacturasController');
      Route::get('/pdfVenta/{id}', 'VentaController@pdf')->name('venta_pdf'); 
      Route::resource('cliente', 'ClienteController');
      Route::resource('usuario', 'UsuarioController');
      Route::get('usuario/password', 'UsuarioController@password');
      Route::post('usuario/updatepassword', 'UsuarioController@updatepassword');
    
    });


    Route::group(['middleware' => ['Administrador']], function () {
      
      Route::resource('cuenta', 'CuentaController');
      Route::resource('asiento', 'AsientoController');
      Route::get('/pdfAsiento/{id}', 'AsientoController@pdf')->name('asiento_pdf');
      Route::resource('mayor', 'MayorController');
      Route::resource('general', 'GeneralController');    
      Route::resource('categoria', 'CategoriaController');
      Route::resource('producto', 'ProductoController');
      Route::get('/listarProductoPdf', 'ProductoController@listarPdf')->name('productos_pdf');
      Route::resource('proveedor', 'ProveedorController');
      Route::resource('compra', 'CompraController'); 
      Route::get('/pdfCompra/{id}', 'CompraController@pdf')->name('compra_pdf');
      Route::resource('venta', 'VentaController');
      Route::resource('factura', 'FacturasController');
      Route::get('/pdfVenta/{id}', 'VentaController@pdf')->name('venta_pdf');
      Route::resource('cliente', 'ClienteController');
      Route::resource('archivo', 'ArchivoController');
      Route::resource('rol', 'RolController');
      Route::resource('user', 'UserController');
      Route::resource('usuario', 'UsuarioController');
      Route::get('usuario/password', 'UsuarioController@password');
      Route::post('usuario/updatepassword', 'UsuarioController@updatepassword');
      Route::resource('log', 'ActivitylogController');
    
    });


});

