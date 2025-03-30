<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\SaveAddressRequest;
use App\Http\Requests\SaveCardRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Mail\Bienvenida;
use App\Models\Address;
use App\Models\Card;
use App\Models\Suscriptor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use MercadoPago\Client\CardToken\CardTokenClient;
use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\PaymentMethod;
use MercadoPago\Resources\Customer\Issuer;
use MercadoPago\Resources\PaymentMethod\Bin;
use MercadoPago\Client\PaymentMethod\PaymentMethodClient;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Mail;

use function PHPUnit\Framework\isEmpty;

class ClientController extends Controller
{
    public function registro()
    {
        return view('register');
    }

    public function ingreso()
    {
        return view('login');
    }

    public function perfil()
    {
        $user = Auth::user();
        $cards = $user->cards;
        $addresses = $user->addresses;
        return view('profile', compact('cards', 'addresses'));
    }

    public function registrarSuscriptor(Request $request)
    {

        $request->validate([
            'email' => 'required|email|regex:/^[\w\.\+-]+@[\w\.-]+\.[a-zA-Z]{2,}$/',
        ]);


        $emailExistsInUsers = User::where('email', $request->email)->exists();
        $emailExistsInNotificationEmails = Suscriptor::where('email', $request->email)->exists();

        if ($emailExistsInUsers || $emailExistsInNotificationEmails) {
            return back()->withErrors(['email' => 'El correo ya está registrado en el sistema.']);
        } else {
            $suscriptor = new Suscriptor();
            $suscriptor->email = $request->email;
            $suscriptor->save();
            return redirect()->route('Home')->with('success', '¡Suscripción exitosa!');
        }
    }

    public function verificarCorreo($token)
    {
        // Buscar al usuario por el token de verificación
        //$correo = User::where('verification_token', $token)->first();
        //dd($token);
        if($token === null){
            return redirect()->route('Home');
        }

        try{
            $correo = decrypt($token);
        //dd($correo);
            $user = User::where('email', $correo)->first();
            $user->email_verified_at = now();
            $user->save();
        }catch(Exception $e){
            return redirect()->route('Home')->withErrors('Correo no verificado');
        }
        
        return redirect()->route('Home')->with('success', 'Correo Verificado');
    }

    public function registrar(RegisterUserRequest $request)
    {

        $notificationEmail = Suscriptor::where('email', $request->email)->first();

        if ($notificationEmail) {
            $notificationEmail->delete();
        }

        $cliente = new User();
        $cliente->nombre_pila = $request->nombre_pila;
        $cliente->apellido_paterno = $request->apellido_paterno;
        $cliente->apellido_materno = $request->apellido_materno;
        $cliente->email = $request->email;
        $cliente->celular = $request->celular;
        $cliente->password = Hash::make($request->password);
        do {
            $token = Str::random(10);
        } while (User::where('remember_token', $token)->exists());

        $tokenVerificar = encrypt($cliente->email);

        Mail::to($cliente->email)->send(new Bienvenida($cliente->nombre_pila, $cliente->email, $tokenVerificar));

        $cliente->remember_token = $token;
        $cliente->email_verified_at = null;
        $cliente->created_at = now();
        $cliente->updated_at = now();
        $cliente->isAdmin = false;
        $cliente->mayorista = false;
        $cliente->mayorista_caducidad = null;
        $cliente->save();

        return redirect()->route('Registro')
            ->with('success', '¡Registro exitoso!');
    }

    public function ingresar(LoginUserRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $remember = $request->has('remember_me');

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();


            if (Auth::user()->isAdmin) {
                // Si es admin, redirigir al panel de administración
                return redirect()->route('Panel');
            } else {
                if (Auth::user()->mayorista_caducidad) {
                    $user = User::find(Auth::user()->id);
                    $hoy = Carbon::now();
                    $fechaCaducidad = Carbon::parse($user->mayorista_caducidad);
                
                    if ($hoy->greaterThanOrEqualTo($fechaCaducidad)) {
                        // La fecha de hoy es mayor o igual a la fecha de caducidad
                        $user->mayorista = 0; // Desactivar mayorista
                        $user->mayorista_caducidad = null; // Limpiar la fecha de caducidad
                        $user->save();
                    } 
                }
                // Si es cliente, redirigir a la página de inicio o la página deseada
                return redirect()->route('Home');
                //return redirect()->intended();
            }
        } else {
            return back()->withErrors([
                'email' => 'Las credenciales proporcionadas no son válidas.',
            ])->withInput($request->except('password'));
        }
    }

    public function cerrarsesion(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function modificarPerfil(UpdateUserRequest $request)
    {

        //$user = ;

        $user = User::findOrFail(Auth::user()->id);

        //$userModificado = new User();

        if ($request->filled('password') && $request->filled('current_password')) {
            if (Hash::check($request->current_password, $user->password)) {
                $user->password = Hash::make($request->password);
            } else {
                return redirect()->back()->withErrors(['current_password' => 'La contraseña actual es incorrecta.']);
            }
        }

        $user->nombre_pila = $request->nombre_pila;
        $user->apellido_paterno = $request->apellido_paterno;
        $user->apellido_materno = $request->apellido_materno;
        $user->celular = $request->celular;

        $user->save();

        return redirect()->back()->with('success', 'Perfil actualizado correctamente.');
    }


    public function guardarDireccion(SaveAddressRequest $request)
    {
        // Validación de los datos de entrada



        $user = User::find(Auth::user()->id);
        // Obtén el usuario autenticado

        // Crear una nueva dirección
        $address = Address::create([
            'calle' => $request->calle,
            'colonia' => $request->colonia,
            'num_ext' => $request->num_ext,
            'num_int' => $request->num_int,
            'municipio' => $request->municipio,
            'estado' => $request->estado,
            'cp' => $request->cp,
        ]);

        // Asociar la dirección con el usuario
        $user->addresses()->attach($address->id);

        // Redirigir o devolver una respuesta
        return redirect()->back()->with('success', 'Dirección guardada y asociada correctamente.');
    }

    public function actualizarDireccion(UpdateAddressRequest $request)
    {
        $address = Address::find($request->address_id_hidden);

        // Mapear los datos del formulario a los atributos del modelo
        $address->estado = $request->estado_edit;
        $address->municipio = $request->municipio_edit;
        $address->cp = $request->cp_edit;
        $address->colonia = $request->colonia_edit;
        $address->calle = $request->calle_edit;
        $address->num_ext =  $request->num_ext_edit;
        $address->num_int =  $request->num_int_edit;

        // Guardar los cambios
        $address->save();

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Dirección actualizada correctamente.');
    }

    public function eliminarDireccion(Request $request)
    {
        // Obtener el ID de la dirección desde el formulario
        $direccionId = $request->id_address;

        // Buscar y eliminar la dirección
        $direccion = Address::findOrFail($direccionId);
        $direccion->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Dirección eliminada correctamente.');
    }

    public function guardarTarjeta(SaveCardRequest $request)
    {
        //MercadoPagoConfig::setAccessToken(env('MERCADOPAGO_ACCESS_TOKEN'));
        //dd($request);
        //$token = $request->cardToken;
        //dd($token);

        // Aquí deberías asociar el token con el usuario en tu base de datos
        //$user = Auth::user(); // Supongamos que el usuario está autenticado
        //$user->cards()->create([
        //    'token' => $token, // Guardas el token
        //    'cardholder_name' => $request->cardholderName, // También puedes guardar el nombre del titular
        //]);

        //return redirect()->back()->with('success', 'Tarjeta guardada y asociada correctamente.');
        MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));

        $user = User::find(Auth::user()->id);
        // Obtén el usuario autenticado

        /*
        $cardToken = new  CardTokenClient();

        $request_options = new RequestOptions();

        $request_options->setCustomHeaders([
            "x-idempotency-key" => uniqid()
        ]);


        $createRequest = [
            "cardnumber" => $request->num_tarjeta,
            "cardExpirationMonth" => $request->mes,
            "cardExpirationYear" => $request->anio,
            "securityCode" => $request->cvv,
            "cardholderName" =>  $request->owner,
        ];

        $response = $cardToken->create($createRequest, $request_options);

        //Sdd($response->id);

        $client = new PaymentClient();

        /*

        $request_options_soli = new RequestOptions();

        $request_options_soli->setCustomHeaders([
            "x-idempotency-key" => uniqid()
        ]);

        */

        /*$createRequest_soli = [
            "token" => $response->id,
            "transaction_amount" => 400,
            "installments" => 1,
            "payer" => [
                "email" => 'siempregabo2016@gmail.com',
            ],
        ];

        //dd($createRequest);

        $response = $client->create($createRequest_soli, $request_options_soli);
        
        dd($response->status_detail);*/

        // Realiza la solicitud para obtener el método de pago
        //$response = Bin::class;
        // Crear una nueva dirección
        //dd($request->fvc);

        $card = Card::create([
            'num_tarjeta' => encrypt($request->num_tarjeta),
            'owner' => $request->owner,
            'mes' => $request->mes,
            'anio' => $request->anio,
            //'fvc' => Carbon::createFromFormat('m/y', $request->mes . '/' . $request->anio)->startOfMonth(),
            //'fvc' => $request->fvc . '-01',
            'cvv' => encrypt($request->cvv),
            'last_digits' => substr($request->num_tarjeta, -4),
        ]);




        // Asociar la dirección con el usuario
        $user->cards()->attach($card->id);

        // Redirigir o devolver una respuesta
        return redirect()->back()->with('success', 'Tarjeta guardada y asociada correctamente.');
    }

    public function actualizarTarjeta(UpdateCardRequest $request)
    {
        //dd($request->owner_edit);

        $card = Card::find($request->card_id_hidden);

        // Mapear los datos del formulario a los atributos del modelo
        $card->owner = $request->owner_edit;
        $card->num_tarjeta = $request->num_tarjeta_edit;
        $card->mes = $request->mes_edit;
        $card->anio = $request->anio_edit;
        $card->cvv = $request->cvv_edit;
        $card->last_digits = substr($request->num_tarjeta_edit, -4);

        // Guardar los cambios
        $card->save();

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Tarjeta actualizada correctamente.');
    }

    public function eliminarTarjeta(Request $request)
    {
        $cardId = $request->id_card;

        $card = Card::findOrFail($cardId);
        $card->delete();

        return redirect()->back()->with('success', 'Tarjeta eliminada correctamente.');
    }

    public function getPrice(Request $request)
    {

        /*$price = DB::table('material_endurance')
            ->where('product_id', $request->product_id)
            ->where('material_id', $request->material_id)
            ->where('endurance_id', $request->endurance_id)
            ->value('precio');*/

        if ($request->has('material_id') && !$request->has('endurance_id')) {
            $query = DB::table('material_product')
                ->where('product_id', $request->product_id)
                ->where('material_id', $request->material_id)
                ->select('precio', 'ancho', 'alto', 'largo','peso')
                ->first();
        }

        if ($request->has('material_id') && $request->has('endurance_id')) {
            $query = DB::table('material_endurance')
                ->where('product_id', $request->product_id)
                ->where('material_id', $request->material_id)
                ->where('endurance_id', $request->endurance_id)
                ->select('precio', 'ancho', 'alto', 'largo','peso')
                ->first();
        }

        if ($request->has('weight_id') && $request->has('length_id')) {
            $query = DB::table('weight_length')
                ->where('product_id', $request->product_id)
                ->where('weight_id', $request->weight_id)
                ->where('length_id', $request->length_id)
                ->select('precio', 'ancho', 'alto', 'largo','peso')
                ->first();
        }

        if ($request->has('weight_id') && !$request->has('length_id')) {
            $query = DB::table('weight_product')
                ->where('product_id', $request->product_id)
                ->where('weight_id', $request->weight_id)
                ->select('precio', 'ancho', 'alto', 'largo','peso')
                ->first();
        }

        if ($request->has('length_id') && !$request->has('weight_id')) {
            $query = DB::table('length_product')
                ->where('product_id', $request->product_id)
                ->where('length_id', $request->length_id)
                ->select('precio', 'ancho', 'alto', 'largo','peso')
                ->first();
        }

        if ($request->has('size_id')) {
            $query = DB::table('size_product')
                ->where('product_id', $request->product_id)
                ->where('size_id', $request->size_id)
                ->select('precio', 'ancho', 'alto', 'largo','peso')
                ->first();
        }

        if ($request->has('wholesale_id')) {
            $query = DB::table('wholesale_product')
                ->where('product_id', $request->product_id)
                ->where('wholesale_id', $request->wholesale_id)
                ->select('precio', 'ancho', 'alto', 'largo','peso')
                ->first();
        }



        return response()->json(['producto' => $query]);
    }


    public function getCardData($id)
    {
        $card = Card::find($id);
        if (!$card) {
            return response()->json(['error' => 'Tarjeta no encontrada'], 404);
        }

        return response()->json([
            'success' => true,
            'num_tarjeta' => decrypt($card->num_tarjeta),
            'mes' => $card->mes,
            'anio' => $card->anio,
            'cvv' => decrypt($card->cvv),
            'owner' => $card->owner,
        ]);
    }
}
