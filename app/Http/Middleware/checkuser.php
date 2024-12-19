<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkuser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $route = $request->route()->getName();
        //dd($route);
        if (Auth::check()) {
            if (!Auth::user()->isAdmin) { //Si no es admin
                if (in_array($route, [
                    'Ingreso',
                    'Registro',
                    'Registrar',
                    'Ingresar',
                    'Panel',
                    'UsuariosAdministrador',
                    'EliminarUsuario',
                    'PedidosAdministrador',
                    'ProductosAdministrador',
                    'EditarProducto',
                    'CodigosAdministrador',
                    'AgregarCodigo',
                    'ActualizarCodigo',
                    'EliminarCodigo',
                    'RegistrarAdmin','RegistroAdmin'
                ])) {
                    return redirect()->route('Home');
                }
            } else { //Si es admin
                if (in_array($route, [
                    'Catalogo',
                    'Contacto',
                    'Producto',
                    'Categoria',

                    'Carrito',
                    'agregar-al-carrito',
                    'actualizar-carrito',
                    'eliminar-del-carrito',
                    'get-price',

                    'ProcesarPedido',
                    'RealizarPedido',
                    'ProcesarPago',
                    'ConfirmarPedido',
                    'Pedidos',

                    'Ingreso',
                    'Registro',

                    'Perfil',
                    'Registrar',
                    'Ingresar',
                    'ModificarPerfil',

                    'GuardarDireccion',
                    'ActualizarDireccion',
                    'EliminarDireccion',
                    'Suscribirse',
                    'VerificarCorreo',
                ])) {
                    return redirect()->route('Panel');
                }
            }
        } else { //Si no esta logueado
            if (in_array($route, [
                'Perfil',
                'Pedidos',

                'GuardarDireccion',
                'ActualizarDireccion',
                'EliminarDireccion',

                'GuardarTarjeta',
                'ActualizarTarjeta',
                'EliminarTarjeta',

                'ModificarPerfil',

                'Panel',

                'UsuariosAdministrador',

                'EliminarUsuario',
                'PedidosAdministrador',
                'ProductosAdministrador',
                'EditarProducto',
                'CodigosAdministrador',
                'AgregarCodigo',
                'ActualizarCodigo',
                'EliminarCodigo',
                'RegistrarAdmin','RegistroAdmin'
            ])) {
                return redirect()->route('Ingreso');
            }
        }

        return $next($request);
    }
}
