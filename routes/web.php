<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;

//Vistas sin middleware
Route::get('/', HomeController::class)
    ->name('Home');

Route::middleware(['auth'])->group(function () {
    Route::get('/Catalogo', [HomeController::class, 'catalogo'])
        ->name('Catalogo');
    Route::get('/Catalogo/{Categoria}', [HomeController::class, 'categoria'])
        ->name('Categoria');
    Route::get('/producto/{slug}', [HomeController::class, 'show'])
        ->name('Producto');
    Route::get('/Contacto', [HomeController::class, 'contacto'])
        ->name('Contacto');
    Route::post('/Contactar', [HomeController::class, 'contactar'])
        ->name('Contactar');

    //Manipular ordenes
    Route::get('/Carrito', [CartController::class, 'mostrarCarrito'])
        ->name('Carrito');

    Route::post('/agregarCarrito', [CartController::class, 'agregarAlCarrito'])
        ->name('agregar-al-carrito');

    Route::get('/actualizarCarrito', [CartController::class, 'actualizarCarrito'])
        ->name('actualizar-carrito');

    Route::delete('/eliminarCarrito', [CartController::class, 'eliminarDelCarrito'])
        ->name('eliminar-del-carrito');

    Route::get('/get-price', [ClientController::class, 'getPrice'])
        ->name('get-price');




    //Acciones del pedido
    Route::get('/procesarPedido', [CartController::class, 'procesarPedido'])
        ->name('ProcesarPedido');

    Route::post('/realizarPedido', [CartController::class, 'realizarPedido'])
        ->name('RealizarPedido');

    Route::post('/procesarPago', [CartController::class, 'procesarPago'])
        ->name('ProcesarPago');

    Route::get('/confirmarPedido', [CartController::class, 'status'])
        ->name('ConfirmarPedido');

    //Pedidos
    Route::get('/misPedidos', [HomeController::class, 'pedidos'])
        ->name('Pedidos');

    //Inicio y registro vistas
    Route::get('/Ingresar', [ClientController::class, 'ingreso'])
        ->name('Ingreso');

    Route::get('/Registrar', [ClientController::class, 'registro'])
        ->name('Registro');

    //Vista del perfil
    Route::get('/Perfil', [ClientController::class, 'perfil'])
        ->name('Perfil');

    //Inicio y registro
    Route::post('/Registrar', [ClientController::class, 'registrar'])
        ->name('Registrar');
    Route::post('/Ingresar', [ClientController::class, 'ingresar'])
        ->name('Ingresar');
    Route::put('/Perfil', [ClientController::class, 'modificarPerfil']) //actualizar el usuario
        ->name('ModificarPerfil');

    //Modificar info del cliente
    Route::post('/guardarDireccion', [ClientController::class, 'guardarDireccion'])
        ->name('GuardarDireccion');
    Route::put('/actualizarDireccion', [ClientController::class, 'actualizarDireccion'])
        ->name('ActualizarDireccion');
    Route::delete('/eliminarDireccion', [ClientController::class, 'eliminarDireccion'])
        ->name('EliminarDireccion');
    Route::post('/Suscribirse', [ClientController::class, 'registrarSuscriptor'])
        ->name('Suscribirse');
    Route::get('/verificar-correo/{token}', [ClientController::class, 'verificarCorreo'])
        ->name('VerificarCorreo');
    Route::get('/CerrarSesion', [ClientController::class, 'cerrarsesion'])
        ->name('Logout');


    // Acciones de administrador
    Route::get('/Panel', [AdminController::class, 'panel'])
        ->name('Panel');
    Route::get('/registrarAdmin', [AdminController::class, 'registrarAdmin'])
        ->name('RegistrarAdmin');
    Route::post('/registroAdmin', [AdminController::class, 'registroAdmin'])
        ->name('RegistroAdmin');

    Route::get('/notificacionesAdministrador', [AdminController::class, 'notificacionesAdministrador'])
        ->name('NotificacionesAdministrador');

    Route::post('/enviarNotificacion', [AdminController::class, 'enviarNotificacion'])
        ->name('EnviarNotificacion');

    Route::get('/Usuarios', [AdminController::class, 'usuarios'])
        ->name('UsuariosAdministrador');

    Route::delete('/eliminarUsuario', [AdminController::class, 'eliminarUsuario'])
        ->name('EliminarUsuario');

    Route::get('/Pedidos', [AdminController::class, 'pedidos'])
        ->name('PedidosAdministrador');

    Route::get('/Productos', [AdminController::class, 'productos'])
        ->name('ProductosAdministrador');

    Route::get('/Productos/{Producto}', [AdminController::class, 'editarProducto'])
        ->name('EditarProducto');

    Route::get('/nuevoProducto', [AdminController::class, 'nuevoProducto'])
        ->name('NuevoProducto');

    Route::get('/eliminarVariante', [AdminController::class, 'eliminarVariante'])
        ->name('EliminarVariante');

    Route::post('/guardarProducto', [AdminController::class, 'guardarProducto'])
        ->name('GuardarProducto');

    Route::post('/almacenarProducto', [AdminController::class, 'almacenarProducto'])
        ->name('AlmacenarProducto');

    Route::delete('/eliminarProducto', [AdminController::class, 'eliminarProducto'])
        ->name('EliminarProducto');

    Route::get('/Codigos', [AdminController::class, 'codigos'])
        ->name('CodigosAdministrador');
    Route::post('/agregarCodigo', [AdminController::class, 'agregarCodigo'])
        ->name('AgregarCodigo');
    Route::get('/actualizarCodigo', [AdminController::class, 'actualizarCodigo'])
        ->name('ActualizarCodigo');
    Route::delete('/eliminarCodigo', [AdminController::class, 'eliminarCodigo'])
        ->name('EliminarCodigo');

    Route::get('/cambiar-estado', [AdminController::class, 'cambiarEstado'])
        ->name('cambiar-estado');

    Route::get('/actualizar-usuario-mayorista', [AdminController::class, 'cambiarEstadoMayorista'])
        ->name('actualizar-usuario-mayorista');
});


//Ya no se usan 

Route::post('/guardarTarjeta', [ClientController::class, 'guardarTarjeta'])
    ->middleware('auth')
    ->name('GuardarTarjeta');
Route::put('/actualizarTarjeta', [ClientController::class, 'actualizarTarjeta'])
    ->middleware('auth')
    ->name('ActualizarTarjeta');
Route::delete('/eliminarTarjeta', [ClientController::class, 'eliminarTarjeta'])
    ->middleware('auth')
    ->name('EliminarTarjeta');


Route::get('/get-card-data/{id}', [ClientController::class, 'getCardData']);

Route::post('/create-card-token', [CartController::class, 'createCardToken']);

Route::post('/processPayment', [CartController::class, 'processPayment']);

Route::post('/almacenarPedido', [CartController::class, 'almacenarPedido'])
    ->middleware('auth')
    ->name('AlmacenarPedido');
