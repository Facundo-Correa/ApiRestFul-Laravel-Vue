<?php

use App\FirebaseUserToken;
use App\Http\Controllers\FirebaseNotificationController;
use App\NotificationQueue;
use App\V2Promos;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Users
Route::post('login', 'UsersController@login');
Route::post('loginexterno', 'UsersController@loginExterno');
Route::post('checktoken', 'UsersController@checktoken');
Route::post('renovateToken', 'UsersController@renovateToken');
Route::post('register', 'UsersController@register');
Route::post('accountrecovery', 'UsersController@passRecovery');
Route::get('users', 'UsersController@show')->middleware('auth:api');
Route::get('users/puntos', 'UsersController@getPuntos')->middleware('auth:api');

//Presupuestos
Route::post('presupuesto', 'PresupuestosController@store')->middleware('auth:api');
Route::post('editPresupuestoM', 'PresupuestosController@editM')->middleware('auth:api');
Route::post('editPresupuestoW', 'PresupuestosController@editW')->middleware('auth:api');

//Presupuesto_producto
Route::post('guardarpresupuesto', 'PresupuestosProductosController@store')->middleware('auth:api');


//Mis Presupuestos
Route::get('mispresupuestos', 'MisPresupuestosController@index')->middleware('auth:api');
Route::post('borrarpresupuesto/{id}', 'MisPresupuestosController@borrarPresupuesto')->middleware('auth:api');
Route::post('enviarmail', 'MisPresupuestosController@enviarMail')->middleware('auth:api');
Route::post('compras', 'MisPresupuestosController@compras')->middleware('auth:api');
Route::get('miscompras', 'MisPresupuestosController@miscompras')->middleware('auth:api');

//Mi Perfil
Route::post('miperfil', 'MiPerfilController@update')->middleware('auth:api');

//Voz
Route::get('buscarparte/{parte}', 'PartesController@buscarparte')->middleware('auth:api');
Route::get('buscarmarca/{marca}', 'MarcasController@buscarmarca')->middleware('auth:api');
Route::get('buscarmodelo/{modelo}', 'ModelosController@buscarmodelo')->middleware('auth:api');

// AdminBO
Route::get('admin/clientes', 'admin\ClientesController@getClientes')->middleware('auth:api');
Route::put('admin/clientes/busqueda', 'admin\ClientesController@filterCLient')->middleware('auth:api');
Route::get('admin/clientes/persona', 'admin\ClientesController@busqueda')->middleware('auth:api');
Route::post('admin/clientes/changeStatus/{cliente_id}', 'admin\ClientesController@changeStatus')->middleware('auth:api');
Route::post('admin/clientes/editClient/{id}/{n_plataforma}', 'admin\ClientesController@editClient')->middleware('auth:api');
Route::delete('admin/clientes/delCliente/{id}', 'admin\ClientesController@destroy')->middleware('auth:api');
Route::get('tipousuario', 'TipoPersonaController@index')->middleware('auth:api');

//AdminBO Promociones Ofertas y Combos
Route::get('admin/promociones', 'admin\PromocionesController@index')->middleware('auth:api');
Route::post('admin/admofertas/store', 'admin\OfertaController@store')->middleware('auth:api');
Route::post('admin/admofertas/update', 'admin\OfertaController@update')->middleware('auth:api');
Route::get('admin/admofertas', 'admin\OfertaController@index')->middleware('auth:api');
Route::post('admin/admofertas/newID', 'admin\OfertaController@getNewId');
Route::post('admin/admofertas/isOffer', 'admin\OfertaController@isOffer');
Route::post('admin/admofertas/offerCriteryPrice', 'admin\OfertaController@getOfferCriteryPrice');
Route::get('admin/admofertas/{id}', 'admin\OfertaController@oferta')->middleware('auth:api');
Route::delete('admin/admofertas/{id}', 'admin\OfertaController@destroy')->middleware('auth:api');
Route::get('admin/combos', 'admin\CombosController@index')->middleware('auth:api');
Route::post('admin/herramientas/procesar', 'admin\HerramientasController@procesar')->middleware('auth:api');
Route::post('admin/ctecnica/store', 'admin\ConsultaTecnicaController@store')->middleware('auth:api');
Route::delete('admin/ctecnica/{id}', 'admin\ConsultaTecnicaController@destroy')->middleware('auth:api');
Route::get('admin/ctecnica/{id_marca}/{id_modelo}', 'admin\ConsultaTecnicaController@index')->middleware('auth:api');
Route::get('admin/artrel', 'admin\ArticulosRelacionadosController@index')->middleware('auth:api');
Route::post('admin/artrel/store', 'admin\ArticulosRelacionadosController@store')->middleware('auth:api');
Route::delete('admin/artrel/{id}', 'admin\ArticulosRelacionadosController@destroy')->middleware('auth:api');


Route::get('geo', 'GeolocalizacionController@geo');
Route::get('tipopersona', 'TipoPersonaController@show');
Route::get('carousel', 'CarouselController@show');
Route::get('ofertas', 'OfertasController@index');
Route::get('portada/{id}', 'OfertasController@portada');
Route::get('ofe', 'OfertasController@ofertas');
Route::get('promos', 'V2PromoVistaController@promos');
Route::get('combos', 'V2PromoVistaController@combos');

Route::get('import', 'ImportController@store');
Route::get('partes', 'PartesController@index');
Route::get('marcas', 'MarcasController@index');
Route::get('origen', 'OrigenController@index');
Route::get('tpartes/', 'ConsultaCodigoController@index');
Route::get('tpartes/{id_marca}/{id_modelo}', 'ConsultaCodigoController@search');


Route::get('modelos/{marca_id}', 'ModelosController@index');

//Geolocalizacioln
Route::get('geodata/{parent_id}', 'GeolocalizacionController@index');


//Productos
Route::middleware('auth:api')->group(function () {
    Route::get('producto', 'ProductoController@index');
    Route::get('producto/busqueda', 'ProductoController@busqueda');
    Route::get('productos/all', 'ProductoController@all');
    Route::get('related', 'ProductoController@related');
});
//Dolar
Route::get('dolar/valor', 'ProductoController@getDolar');

//Proveedores
Route::get('proveedores/home', 'ProveedoresController@showProveedores');

// Wishlist <- son los presupuestos en el header
Route::middleware('auth:api')->group(function () {
    Route::get('wishlist', 'WishlistProductosController@index');
    Route::post('wishlist', 'WishlistProductosController@store');
    Route::delete('wishlist', 'WishlistProductosController@delete');
});

// Wishlist2 <- favoritos
Route::middleware('auth:api')->group(function () {
    Route::get('favoritos', 'FavoritosProductosController@index');
    Route::post('favoritos', 'FavoritosProductosController@store');
    Route::delete('favoritos', 'FavoritosProductosController@delete');
});

// Basket
Route::middleware('auth:api')->group(function () {
    Route::get('basket', 'BasketController@index');
    Route::put('basket', 'BasketController@update');
    Route::delete('basket', 'BasketController@destroy');
    Route::get('basket/summary', 'BasketController@getSummary');
    Route::post('basket/checkout', 'BasketController@checkout');
    Route::post('basket/get', 'BasketController@index');
});


// Publicidades
Route::get('publicidades', 'PublicidadController@index');

Route::get('ofertas/portada', 'OfertasController@portada');


//NewsLetters
Route::get('newsletters/all', 'NewslettersController@index');
Route::put('newsletters/update/{newsletter}', 'NewslettersController@update');
Route::put('newsletters/busqueda', 'NewslettersController@busqueda');
Route::post('newsletters/store', 'NewslettersController@store');
Route::delete('newsletters/delete/{newsletter}', 'NewslettersController@destroy');
//Newsletter User
Route::put('newsletters/user/add/{persona_id}', 'NewslettersController@addUser');
//Newsletter Guest
Route::post('newsletters/guest/add/{mail}', 'NewslettersController@addGuest');

//Publicidades
Route::get('publicitys/all', 'PublicidadController@index');
Route::put('publicitys/update/{publicity}', 'PublicidadController@update');
Route::put('publicitys/busqueda', 'PublicidadController@busqueda');
Route::post('publicitys/store', 'PublicidadController@store');
Route::delete('publicitys/delete/{publicity}', 'PublicidadController@destroy');

//Ofertas
Route::get('ofertas', 'OfertasController@index');
Route::post('ofertas/getOfertaByProdID', 'OfertasController@getOfertaByProdID')->middleware('auth:api');


//Promociones
Route::get('promos/promo/{promo_id}', 'V2PromoVistaController@getPromo');


//Tipo Publicidades
Route::get('tipopublicitys/all', 'TipoPublicidadController@index');

//Secciones
Route::get('secciones/all', 'SeccionController@index');

//Carousel
Route::get('carousel', 'CarouselController@index');

//Consultas
Route::post('consultas', 'ConsultaController@store');

//RSS Noticias
Route::get('noticias/home', 'NoticiasController@feedsHome');

//Consulta Tecnica
Route::get('ctecnica', 'ConsultaTecnicaController@index');

// || Sección actualizacion III || //

Route::post('years', 'ComprobanteController@years');
Route::post('comprobantes', 'ComprobanteController@get');
Route::post('all-comprobantes', 'ComprobanteController@getAll');
Route::post('enviar-comprobante', 'ComprobanteController@send');
Route::post('guardar-comprobante', 'ComprobanteController@save');
Route::post('eliminar-comprobantes', 'ComprobanteController@delete');

Route::get('descargar/{id}', 'DownloadController@download');
Route::get('/nottest', function () {
    FirebaseNotificationController::send_fcm(false);
});

// || Fin seccion || //
