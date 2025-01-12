<?php

namespace App\Http\Controllers;

use App\Mail\Pedido;
use App\Models\Address;
use App\Models\Card;
use App\Models\Code;
use App\Models\Detail;
use App\Models\Endurance;
use App\Models\Length;
use App\Models\Material;
use App\Models\Order;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use App\Models\Weight;
use App\Models\Wholesale;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use MercadoPago\Client\CardToken;
use MercadoPago\Client\CardToken\CardTokenClient;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\Client\MercadoPagoClient;
use MercadoPago\Exceptions\MPApiException;
use PhpParser\Node\Stmt\TryCatch;

use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{

    // Acciones del carrito
    public function agregarAlCarrito(Request $request)
    {
        //dd($request);
        $producto = [
            'id' => $request->product,
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'slug' => $request->slug,
            'cantidad' => 1,
            'category' => $request->category,
            'materialEndurance' => $request->materialEndurance,
            'enduranceMaterial' => $request->enduranceMaterial,
            'material' => $request->material,
            'lengthWeight' => $request->lengthWeight,
            'weightLength' => $request->weightLength,
            'weight' => $request->weight,
            'length' => $request->length,
            'size' => $request->size,
            'wholesale' => $request->wholesale,
        ];

        try {
            $productoBase = Product::find($request->product);
        } catch (Exception $e) {
            //dd('aqui');
            return  redirect()->route('Home')->withErrors(['Carrito' => 'Alerta']);
        }


        $producto = array_filter($producto, function ($value) {
            return $value !== null;
        });

        //dd($producto);

        if ($productoBase->variante) {
            try {
                $precioCombinacion = null;
                //dd($producto);
                if (isset($producto['materialEndurance']) && isset($producto['enduranceMaterial'])) {
                    $materialId = $producto['materialEndurance'];
                    $enduranceId = $producto['enduranceMaterial'];

                    $precioCombinacion = DB::table('material_endurance')
                        ->where('material_id', $materialId)
                        ->where('endurance_id', $enduranceId)
                        ->where('product_id', $productoBase->id)
                        ->value('precio');
                }

                if (isset($producto['material'])) {
                    $materialId = $producto['material'];
                    $precioCombinacion = DB::table('material_product')
                        ->where('material_id', $materialId)
                        ->where('product_id', $productoBase->id)
                        ->value('precio');
                }

                if (isset($producto['lengthWeight']) && isset($producto['weightLength'])) {
                    $lengthId = $producto['lengthWeight'];
                    $weightId = $producto['weightLength'];
                    $precioCombinacion = DB::table('weight_length')
                        ->where('weight_id', $weightId)
                        ->where('length_id', $lengthId)
                        ->where('product_id', $productoBase->id)
                        ->value('precio');
                }

                if (isset($producto['weight'])) {
                    $weightId = $producto['weight'];
                    $precioCombinacion = DB::table('weight_product')
                        ->where('weight_id', $weightId)
                        ->where('product_id', $productoBase->id)
                        ->value('precio');
                }

                if (isset($producto['length'])) {
                    $lengthId = $producto['length'];
                    $precioCombinacion = DB::table('length_product')
                        ->where('length_id', $lengthId)
                        ->where('product_id', $productoBase->id)
                        ->value('precio');
                }

                if (isset($producto['size'])) {
                    $sizeId = $producto['size'];
                    $precioCombinacion = DB::table('size_product')
                        ->where('size_id', $sizeId)
                        ->where('product_id', $productoBase->id)
                        ->value('precio');
                }

                if (isset($producto['wholesale'])) {
                    $wholesaleId = $producto['wholesale'];
                    $precioCombinacion = DB::table('wholesale_product')
                        ->where('wholesale_id', $wholesaleId)
                        ->where('product_id', $productoBase->id)
                        ->value('precio');
                }
                //dd($precioCombinacion);
                if ((float) $precioCombinacion !== (float) $producto['precio'] || $precioCombinacion === null) {
                    return  redirect()->route('Home')->withErrors(['Carrito' => 'Alerta']);
                }
            } catch (Exception $e) {
                //dd('error');
                return  redirect()->route('Home')->withErrors(['Carrito' => 'Alerta']);
            }
        } else {
            if (
                (float) $productoBase->precio !== (float) $producto['precio']
                || $productoBase->nombre !== $producto['nombre']
                || $productoBase->slug !== $producto['slug']
                || (float) $productoBase->category_id !== (float) $producto['category']
            ) {
                return  redirect()->route('Home')->withErrors(['Carrito' => '¡¡Alerta!!']);
            }
        }

        //dd($producto);




        $carrito = Session::get('carrito', []);

        //dd($carrito);
        foreach ($carrito as &$item) {
            $tempItem = $item;
            unset($tempItem['cantidad']);
            if (isset($tempItem['details_array'])) {
                unset($tempItem['details_array']);
            }
            $tempProducto = $producto;
            unset($tempProducto['cantidad']);
            if (isset($tempProducto['details_array'])) {
                unset($tempProducto['details_array']);
            }
            if ($tempItem == $tempProducto) {
                // Si el producto ya existe en el carrito, incrementar la cantidad
                $item['cantidad'] += 1;
                $existe = true;
                break;
            }
        }

        //dd($carrito);

        // Si el producto no existe en el carrito, agregarlo
        if (!isset($existe)) {
            $carrito[] = $producto;
        }
        if (!isset($producto['details_array'])) {
            foreach ($carrito as &$producto) {

                $atributos = [];
                $atributosString = '';

                if (isset($producto['materialEndurance'])) {
                    $materialEndurance = Material::find($producto['materialEndurance']);
                    if ($materialEndurance) {
                        $atributos[] = $materialEndurance->material;
                    }
                }

                if (isset($producto['enduranceMaterial'])) {
                    $enduranceMaterial = Endurance::find($producto['enduranceMaterial']);
                    if ($enduranceMaterial) {
                        $atributos[] = $enduranceMaterial->endurance;
                    }
                }

                if (isset($producto['material'])) {
                    $material = Material::find($producto['material']);
                    if ($material) {
                        $atributos[] = $material->material;
                    }
                }

                if (isset($producto['lengthWeight'])) {
                    $lengthWeight = Length::find($producto['lengthWeight']);
                    if ($lengthWeight) {
                        $atributos[] = $lengthWeight->length;
                    }
                }

                if (isset($producto['weightLength'])) {
                    $weightLength = Weight::find($producto['weightLength']);
                    if ($weightLength) {
                        $atributos[] = $weightLength->weight;
                    }
                }

                if (isset($producto['weight'])) {
                    $weight = Weight::find($producto['weight']);
                    if ($weight) {
                        $atributos[] = $weight->weight;
                    }
                }

                if (isset($producto['length'])) {
                    $length = Length::find($producto['length']);
                    if ($length) {
                        $atributos[] = $length->length;
                    }
                }

                if (isset($producto['size'])) {
                    $size = Size::find($producto['size']);
                    if ($size) {
                        $atributos[] = $size->size;
                    }
                }

                if (isset($producto['wholesale'])) {
                    $wholesale = Wholesale::find($producto['wholesale']);
                    if ($wholesale) {
                        $atributos[] = $wholesale->wholesale;
                    }
                }

                if (!empty($atributos)) {
                    $atributosString = implode(', ', $atributos);
                    $producto['details_array'] = $atributosString;
                    //dd($carrito);
                }
            }
        }


        Session::put('carrito', $carrito);
        return redirect()->back();
    }

    public function mostrarCarrito()
    {
        $carrito = Session::get('carrito', []);

        //dd($carrito);
        return view('cart', compact('carrito'));
    }

    public function actualizarCarrito(Request $request)
    {
        $carrito = Session::get('carrito', []);
        $carrito[$request->index]['cantidad'] = intval($request->cantidad);

        Session::put('carrito', $carrito);
        //dd($carrito);
        return response()->json(['cantidad' => $carrito[$request->index]['cantidad']]);
    }

    public function eliminarDelCarrito(Request $request)
    {

        $carrito = Session::get('carrito', []);
        $productIdToFind = $request->id;

        foreach ($carrito as $index => $producto) {
            if (isset($producto['id']) && $producto['id'] == $productIdToFind) {
                // Producto encontrado, mostramos el índice y los detalles
                unset($carrito[$index]);
            }
        }

        Session::put('carrito', $carrito);
        return redirect()->route('Carrito');
    }


    //Acciones del pedido 
    //Seleccionar la direccion 
    public function procesarPedido()
    {

        $carrito = Session::get('carrito', []);

        if (empty($carrito)) {
            return redirect()->route('Home');
        }

        //$descuentoTotal = 0;
        $subtotal = 0;
        $total = 0;

        //dd($carrito);


        foreach ($carrito as &$producto) {

            $subtotal += $producto['precio'] * $producto['cantidad'];
        }

        //$total = $subtotal - $descuentoTotal;



        //dd($response);

        // Verifica si la solicitud fue exitosa
        /*else {
                // Manejo de errores
                return response()->json([
                    'error' => 'No se pudo obtener la cotización',
                    'details' => $response->body()
                ], $response->status());
            }*/
        //dd($carrito);
        $data['carrito'] = $carrito;
        //$data['descuentoTotal'] = $descuentoTotal;
        $data['subtotal'] = $subtotal;
        //$data['total'] = $total;
        //dd($data);
        if (Auth::check()) {
            $user = Auth::user();
            $cards = $user->cards;
            $addresses = $user->addresses;

            if ($addresses->isNotEmpty()) {
                $data['addresses'] = $addresses;
            }

            // if ($cards->isNotEmpty()) {
            //    $data['cards'] = $cards;
            //}



            return view('process', $data);
        } else {
            return view('process', $data);
        }
    }

    //Selecciona metodo de pago
    public function realizarPedido(Request $request)
    {

        $carrito = Session::get('carrito', []);
        dd($request);
        if (empty($carrito)) {
            return redirect()->route('Home');
        }

        $this->getOrCreateAddress($request);
        $subtotal = $this->getSubtotal();
        $envio = $this->getDelivery();
        $descuentoTotal = 0;
        $total = 0;

        if ($request->filled('Codigo')) {
            $codigo = $request->input('Codigo');
            $descuento = Code::where('code', $codigo)->first();
            if ($descuento && $descuento->active === 1) {
                $descuentoTotal = $this->getDescuento($codigo);
                Session::put('code', $descuento);
            } else {
                return redirect()->back()->withErrors(['Codigo' => 'Codigo inválido']);
            }
        }

        $descuentoTotal += $this->getDescuentoIVA();

        $costoTotalEnvio = $envio['costo_total_envio'];
        $detallesEnvio = $envio['detalles_envio'];


        foreach ($detallesEnvio as $detalle) {
            if ($detalle['proveedor'] === null) {
                $costoTotalEnvio = 0;
            }
        }

        $total = $subtotal - $descuentoTotal + $costoTotalEnvio;

        if (!Auth::check()) {
            $request->validate([
                'emailInvitado' => 'required|email|regex:/^[\w\.\+-]+@[\w\.-]+\.[a-zA-Z]{2,}$/',
                'celularInvitado' => 'required|string|min:10|max:10',
            ], [], [ // Tercer parámetro para atributos personalizados
                'emailInvitado' => 'email',
                'celularInvitado' => 'celular',
            ]);
            Session::put('emailInvitado', $request->emailInvitado);
            Session::put('celularInvitado', $request->celularInvitado);
        }

        $data['total'] = $total;
        $data['subtotal'] = $subtotal;
        $data['envio'] = $costoTotalEnvio;
        $data['descuentoTotal'] = $descuentoTotal;
        //$data['address'] = $address;


        return view('payment', $data);
    }

    //Solicita la información del pago
    public function procesarPago(Request $request)
    {
        $carrito = Session::get('carrito', []);
        //$address = Session
        if (empty($carrito)) {
            return redirect()->route('Home');
        }

        MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));
        /*
        if ($request->has('tarjeta_seleccionada')) {
            $card = Card::where('id', $request->tarjeta_seleccionada)->first();
            if ($request->filled('cvv')) {
                if (decrypt($card->cvv) !== $request->cvv) {
                    return redirect()->back()->withErrors(['cvv' => 'CVV incorrecto']);
                } else {
                    /*$cardToken = new  CardTokenClient();

                    $request_options = new RequestOptions();

                    $request_options->setCustomHeaders([
                        "x-idempotency-key" => uniqid()
                    ]);


                    $createRequest = [
                        "cardNumber" => decrypt($card->num_tarjeta),
                        //"cardExpirationMonth" => $card->mes,
                        //"cardExpirationYear" => $card->anio,
                        "expirationDate" => $card->fvc, // Formato "MM/YY"
                        "securityCode" => decrypt($card->cvv),
                        "cardholderName" => $card->owner,
                    ];


                    $cardNumber = '5474925432670366';
                    $cardholderName = 'APRO';
                    $expirationDate = '11/25'; // El formato será MM/YY
                    $securityCode = '123';

                    // Crear el cliente de CardToken
                    $cardTokenClient = new CardTokenClient();

                    // Configurar las opciones de la solicitud
                    $requestOptions = new RequestOptions();
                    $requestOptions->setCustomHeaders([
                        "x-idempotency-key" => uniqid() // Clave única para la idempotencia
                    ]);

                    // Crear la solicitud
                    $createRequest = [
                        "cardNumber" => $cardNumber, // Número de tarjeta
                        "expirationDate" => $expirationDate, // Fecha de vencimiento
                        "securityCode" => $securityCode, // CVV
                        "cardholderName" => $cardholderName, // Nombre del titular
                    ];

                    try {
                        $response = $cardTokenClient->create($createRequest, $requestOptions);

                        // Imprimir el ID del token creado
                        echo "Token de la tarjeta creado: " . $response->id;
                    } catch (Exception $e) {
                        // Manejar errores
                        echo "Error al crear el token de la tarjeta: " . $e->getMessage();
                    }

                    //dd($createRequest);

                    //$response = $cardToken->create($createRequest, $request_options);

                    // Crear un nuevo pago usando el token de la tarjeta
                    $client = new PaymentClient();

                    $request_options = new RequestOptions();
                    $request_options->setCustomHeaders([
                        "X-idempotency-key" => uniqid()
                    ]);

                    $createRequest = [
                        "token" => $response->id, // Usando el token generado
                        "transaction_amount" => (float) $request->transaction_amount, // asegurando que sea un float
                        "installments" => 1,
                        "payer" => [
                            "email" => 'siempregabo2016@gmail.com',
                        ],
                    ];


                    //dd($createRequest);
                    //$response3 = $client->create($createRequest, $request_options);

                    //dd($response3);

                    try {
                        $response3 = $client->create($createRequest, $request_options);

                        // Imprimir el ID del token creado
                        echo "Pago creado: " . $response3;

                        if ($response3->status === "approved") {
                            return response()->json([
                                'success' => true,
                                'message' => 'Pago aprobado',
                                'payment_id' => $response3->id,
                                'status' => $response3->status,
                                'status_detail' => $response3->status_detail,
                                'transaction_amount' => $response3->transaction_amount,
                                'date_approved' => $response3->date_approved
                            ]);
                        } else {
                            return response()->json([
                                'success' => false,
                                'message' => 'Pago rechazado: ' . $response3->status_detail
                            ]);
                        }
                    } catch (MPApiException $e) {
                        // Handle API exceptions
                        echo "Status code: " . $e->getApiResponse()->getStatusCode() . "\n";
                        echo "Content: ";
                        var_dump($e->getApiResponse()->getContent());
                        echo "\n";
                    } catch (\Exception $e) {
                        // Handle all other exceptions
                        echo $e->getMessage();
                    }


                    // Comprobar el estado del pago

                }
            } else {
                return redirect()->back()->withErrors(['cvv' => 'Coloque el CVV']);
            }
        } else {*/

        try {

            $client = new PaymentClient();

            $request_options = new RequestOptions();

            $request_options->setCustomHeaders([
                "x-idempotency-key" => uniqid()
            ]);

            $createRequest = [
                "token" => $request->token,
                "issuer_id" => $request->issuer_id,
                "payment_method_id" => $request->payment_method_id,
                "transaction_amount" => $request->transaction_amount,
                "installments" => $request->installments,
                "payer" => [
                    "email" => $request->payer['email'],
                ],
            ];

            $response = $client->create($createRequest, $request_options);



            // Crear el pago

            // Comprobar si la respuesta es correcta
            if ($response->status === "approved") {
                Session::put('payment_id', $response->id);
                Session::put('payment_status', $response->status);
                Session::put('payer_email', $response->payer->email);
                return response()->json([
                    'success' => true,
                    'token' => $request->token,
                    'status' => $response->status,  // Estado del pago (approved, rejected, etc.)
                    'status_detail' => $response->status_detail,  // Detalle del estado
                    'payment_id' => $response->id,  // ID del pago
                    'transaction_amount' => $response->transaction_amount,  // Monto de la transacción
                    'payer_email' => $response->payer->email,  // Correo del pagador
                    'last_four_digits' => $response->card->last_four_digits,  // Últimos 4 dígitos de la tarjeta
                    'payment_method' => $response->payment_method_id,  // Método de pago
                    'date_approved' => $response->date_approved,  // Fecha de aprobación
                ], 201);
            } else {
                //return redirect()->back()->withErrors(['' => '']);
                Session::put('payment_id', $response->id);
                Session::put('payment_status', $response->status);
                return response()->json([
                    'success' => false,
                    'message' => 'Error al procesar el pago',
                    'payment_id' => $response->id,
                    'status' => $response->status,  // Estado del pago (approved, rejected, etc.)
                    'status_detail' => $response->status_detail,  // Detalle del estado
                    'transaction_amount' => $response->transaction_amount,  // Monto de la transacción
                    'payer_email' => $response->payer->email,  // Correo del pagador
                    'details' => $response,
                ], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error del servidor, inténtelo nuevamente ',

            ], 500);
        }
        //}
    }

    //Manda el status 
    public function status()
    {
        $payment_id = Session::get('payment_id');
        $payment_status = Session::get('payment_status');
        $carrito = Session::get('carrito', []);
        $address = Session::get('address');
        $codigo = Session::get('code');
        
        


        if ($payment_id === null) {
            return redirect()->route('Home')->withErrors(['Error' => 'Error de mercado']);
        } else {
            if ($payment_status === 'approved') {
                DB::beginTransaction();
                try {
                    $subtotal = $this->getSubtotal();
                    $envio = $this->getDelivery();
                    $descuentoTotal = $this->getDescuento($codigo);
                    $descuentoTotal += $this->getDescuentoIVA();
                    $costoTotalEnvio = $envio['costo_total_envio'];
                    $detallesEnvio = $envio['detalles_envio'];

                    foreach ($detallesEnvio as $detalle) {
                        if ($detalle['proveedor'] === null) {
                            $costoTotalEnvio = 0;
                        }
                    }

                    $total = $subtotal - $descuentoTotal + $costoTotalEnvio;

                    $address->save();

                    $order = new Order();
                    $order->total = $total;
                    $order->state = 'En revisión';
                    $order->wholesale = false;
                    $order->address_id = $address->id;
                    if ($codigo !== null) {
                        $order->code_id = $codigo->id;
                    }

                    if (Auth::check()) {
                        $order->user_id = Auth::user()->id;

                        $email = Auth::user()->email;
                        $order->email =  Auth::user()->email;
                        $order->celular = Auth::user()->celular;
                        $mayorista = $this->getMayorista();
                        if ($mayorista) {
                            $user = User::find(Auth::user()->id);
                            $user->mayorista = 1;
                            $user->mayorista_caducidad = Carbon::now()->addMonths(5);
                            $user->save();
                        }
                    } else {
                        $emailInvitado = Session::get('emailInvitado');
                        $celularInvitado = Session::get('celularInvitado');
                        $order->email =  $emailInvitado;
                        $order->celular = $celularInvitado;
                        $email = Session::get('payer_email');
                    }


                    $order->save();
                    $address->save();

                    //dd($order->id);
                    foreach ($carrito as $producto) {

                        $atributos = [];
                        $atributosString = '';

                        if (isset($producto['materialEndurance'])) {
                            $materialEndurance = Material::find($producto['materialEndurance']);
                            if ($materialEndurance) {
                                $atributos[] = $materialEndurance->material;
                            }
                        }

                        if (isset($producto['enduranceMaterial'])) {
                            $enduranceMaterial = Endurance::find($producto['enduranceMaterial']);
                            if ($enduranceMaterial) {
                                $atributos[] = $enduranceMaterial->endurance;
                            }
                        }

                        if (isset($producto['material'])) {
                            $material = Material::find($producto['material']);
                            if ($material) {
                                $atributos[] = $material->material;
                            }
                        }

                        if (isset($producto['lengthWeight'])) {
                            $lengthWeight = Length::find($producto['lengthWeight']);
                            if ($lengthWeight) {
                                $atributos[] = $lengthWeight->length;
                            }
                        }

                        if (isset($producto['weightLength'])) {
                            $weightLength = Weight::find($producto['weightLength']);
                            if ($weightLength) {
                                $atributos[] = $weightLength->weight;
                            }
                        }

                        if (isset($producto['weight'])) {
                            $weight = Weight::find($producto['weight']);
                            if ($weight) {
                                $atributos[] = $weight->weight;
                            }
                        }

                        if (isset($producto['length'])) {
                            $length = Length::find($producto['length']);
                            if ($length) {
                                $atributos[] = $length->length;
                            }
                        }

                        if (isset($producto['size'])) {
                            $size = Size::find($producto['size']);
                            if ($size) {
                                $atributos[] = $size->size;
                            }
                        }

                        if (isset($producto['wholesale'])) {
                            $wholesale = Wholesale::find($producto['wholesale']);
                            if ($wholesale) {
                                $atributos[] = $wholesale->wholesale;
                            }
                        }

                        $atributosString = implode(', ', $atributos);

                        $detail = new Detail();
                        $detail->product_id = $producto['id'];
                        $detail->order_id = $order->id;
                        $detail->costo_envio = $producto['precio_envio'];
                        if ($producto['proveedor'] === null) {
                            $detail->proveedor = 'Buscar proveedor';
                        } else {
                            $detail->proveedor = $producto['proveedor'];
                        }

                        $detail->quantity = $producto['cantidad'];
                        $detail->total = $producto['cantidad'] * $producto['precio'];
                        $detail->description = $atributosString;

                        $detail->save();
                    }

                    Mail::to($email)->send(new Pedido($order, $carrito));

                    Session::forget('payer_email');
                    Session::forget('payment_id');
                    Session::forget('payment_status');
                    Session::forget('carrito');
                    Session::forget('address');
                    Session::forget('code');
                    Session::forget('celularInvitado');
                    Session::forget('emailInvitado');

                    // Si todo va bien, hacemos el commit de la transacción
                    DB::commit();
                } catch (\Exception $e) {
                    // Si ocurre un error, revertimos todos los cambios
                    DB::rollBack();
                    // Puedes manejar el error aquí, como mostrar un mensaje o loguearlo
                    throw $e; // O manejarlo según tus necesidades
                }
            }

            return view('authorized', compact('payment_id'));
        }
    }

    private function getDescuentoIVA()
    {
        $carrito = Session::get('carrito', []);
        $descuento = 0;

        if (Auth::check() && Auth::user()->mayorista) {
            foreach ($carrito as $producto) {
                $descuento += $producto['precio'] * $producto['cantidad'] * 0.16;
            }
            return $descuento;
        }

        $cuentaRefacciones = 0;
        $cuentaMaquinaria = 0;
        $cuentaOtrasCategorias = 0;
        foreach ($carrito as $producto) {
            if ($producto['category'] === 2) { //producto categoria  === banqueteria 
                $cuentaMaquinaria += $producto['precio'] * $producto['cantidad'];
            } elseif ($producto['category'] === 5) { //producto categoria  === refacciones 
                $cuentaRefacciones += $producto['precio'] * $producto['cantidad'];
            } else { //Otras categoria
                $cuentaOtrasCategorias += $producto['precio'] * $producto['cantidad'];
            }
        }

        if ($cuentaMaquinaria >= 60000) {
            //$descuento = $cuentaMaquinaria / 1.16;
            $descuento = $cuentaMaquinaria * 0.16;
        }

        if ($cuentaRefacciones >= 10000) {
            //$descuento = $cuentaRefacciones / 1.16;
            $descuento = $cuentaRefacciones * 0.16;
        }

        if ($cuentaOtrasCategorias >= 25000) {
            //$descuento = $cuentaOtrasCategorias / 1.16;
            $descuento = $cuentaOtrasCategorias * 0.16;
        }


        return $descuento;
    }

    private function getMayorista()
    {
        $carrito = Session::get('carrito', []);
        $descuento = false;
        $cuentaRefacciones = 0;
        $cuentaMaquinaria = 0;
        $cuentaOtrasCategorias = 0;
        foreach ($carrito as $producto) {
            if ($producto['category'] === 2) { //producto categoria  === banqueteria 
                $cuentaMaquinaria += $producto['precio'];
            } elseif ($producto['category'] === 5) { //producto categoria  === refacciones 
                $cuentaRefacciones += $producto['precio'];
            } else { //Otras categoria
                $cuentaOtrasCategorias += $producto['precio'];
            }
        }

        if ($cuentaMaquinaria >= 60000) {
            //$descuento = $cuentaMaquinaria / 1.16;
            $descuento = true;
        }

        if ($cuentaRefacciones >= 10000) {
            //$descuento = $cuentaRefacciones / 1.16;
            $descuento = true;
        }

        if ($cuentaOtrasCategorias >= 25000) {
            //$descuento = $cuentaOtrasCategorias / 1.16;
            $descuento = true;
        }



        return $descuento;
    }

    //Funciones privadas
    private function delivery($weight, $height, $width, $length, $zipTo)
    {
        $response['proveedor'] = null;

        $carriers = [
            [
                ['name' => 'Fedex'],
                ['name' => 'Estafeta'],
                ['name' => 'Tresguerras'],
            ],
            [
                ['name' => 'DHL'],
                ['name' => 'Jtexpress'],
                ['name' => 'Paquetexpress'],
            ],
            //[['name' => 'UPS'],['name' => 'Sendex'],['name' => 'Quiken'],['name' => 'Tracusa'],['name' => 'Ninetynineminutes'],]
        ];

        foreach ($carriers as $index => $list) {
            //dd($list);
            $response = $this->deliveryRequest($weight, $height, $width, $length, $zipTo, $list);

            if ($response['proveedor'] === null) {
                break;
            }
        }

        return $response;
    }

    private function getDescuento($descuento)
    {
        $carrito = Session::get('carrito', []);
        $descuentoTotal = 0;
        foreach ($carrito as &$producto) {
            if ($descuento) {
                if (preg_match('/B.*E.*G.*V/i', $descuento)) {
                    $category = $producto['category'];
                    if ($category === '5' || $category === '3' || $category === '2') {
                        $descuentoTotal += ($producto['precio'] * $producto['cantidad']) * 0.05;
                    } else {
                        $descuentoTotal += ($producto['precio'] * $producto['cantidad']) * 0.03;
                    }
                }
                //if(preg_match('FREEDELIVERY2024',$descuento)){
                //
                //}

            }
        }
        return $descuentoTotal;
    }

    private function deliveryRequest($weight, $height, $width, $length, $zipTo, $carriers)
    {
        $moreCheaper = 0;
        $provider = null;

        $response = Http::withHeaders([
            'Authorization' => 'Token token=uPq7tyHx-hhsgnAwOxgzpGlzuzY2wkr-bYRO9xgeWiA',
            'Content-Type' => 'application/json'
        ])->post('https://api-demo.skydropx.com/v1/quotations', [
            'zip_from' => '57120', // Código postal de origen estático
            'zip_to' => $zipTo,   // Código postal de destino estático
            'parcel' => [
                'weight' => $weight,     // Peso del paquete en kg
                'height' => $height,    // Altura en cm
                'width' => $width,     // Ancho en cm
                'length' => $length     // Largo en cm
            ],
            'carriers' => $carriers
        ]);


        if ($response->successful()) {
            $quotation = $response->json();
            //Xdd($quotation);
            if (empty($quotation)) {
                $data['envio'] = $moreCheaper;
                $data['proveedor'] = $provider;
                return $data;
            }

            foreach ($quotation as $proveedor) {
                if ($moreCheaper === 0) {
                    $moreCheaper = intval($proveedor['amount_local']);
                    $provider = $proveedor['provider'];
                } else {
                    if ($moreCheaper > intval($proveedor['amount_local'])) {
                        $moreCheaper = intval($proveedor['amount_local']);
                        $provider = $proveedor['provider'];
                    }
                }
            }

            $data['envio'] = $moreCheaper;
            $data['proveedor'] = $provider;
            return $data;
        } else {
            return redirect()->route('Carrito')->withErrors(['Envío' => 'Servicio de paquetería no disponible']);
        }
    }

    private function getDelivery()
    {
        $address = Session::get('address');
        $carrito = Session::get('carrito', []);
        $envio = 0;
        $detallesEnvio = [];
        foreach ($carrito as &$producto) {
            $response = $this->delivery(1, 1, 1, 1, $address->cp);
            try {
                $envioProducto = $response['envio'] * $producto['cantidad'];
                $envio += $envioProducto;
                $detallesEnvio[] = [
                    'precio_envio' => $envioProducto,
                    'proveedor' => $response['proveedor']
                ];
                $producto['precio_envio'] = $envioProducto;
                $producto['proveedor'] = $response['proveedor'];
            } catch (\Throwable $th) {
                break;
            }
        }
        Session::put('carrito', $carrito);
        return [
            'costo_total_envio' => $envio,
            'detalles_envio' => $detallesEnvio
        ];
    }

    private function getOrCreateAddress(Request $request)
    {
        if ($request->has('direccion_seleccionada')) {
            $address = Address::where('id', $request->direccion_seleccionada)->first();
        } else {
            $request->validate([
                'calle' => 'required|string|max:100|min:1|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s\.\,\-]+$/',
                'estadoEnvio' => 'required|string|max:100|min:1',
                'num_ext' => 'required|string|max:10|min:1|regex:/^[0-9A-Za-z\-\/]+$/',
                'num_int' => 'nullable|string|max:10|min:1|regex:/^[0-9A-Za-z\-\/]+$/',
                'municipioEnvio' => 'required|string|max:100|min:1',
                'colonia' => 'required|string|max:70|min:1|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s\.\,\-]+$/',
                'cp' => 'required|digits:5',
            ], [], [ // Tercer parámetro para atributos personalizados
                'calle' => 'calle',
                'estadoEnvio' => 'estado',
                'num_ext' => 'número exterior',
                'num_int' => 'número interior',
                'municipioEnvio' => 'municipio',
                'colonia' => 'colonia',
                'cp' => 'código postal',
            ]);
            $address = new Address();
            $address->calle = $request->calle;
            $address->estado = $request->estadoEnvio;
            $address->municipio = $request->municipioEnvio;
            $address->num_ext = $request->num_ext;
            $address->num_int = $request->num_int;
            $address->colonia = $request->colonia;
            $address->cp = $request->cp;
        }
        Session::put('address', $address);
        return $address;
    }

    private function getSubtotal()
    {
        $subtotal = 0;
        $carrito = Session::get('carrito', []);
        foreach ($carrito as &$producto) {
            $subtotal += $producto['precio'] * $producto['cantidad'];
        }
        return $subtotal;
    }

    //Basura 
    public function almacenarPedido(Request $request)
    {
        //dd($request);
        DB::beginTransaction();

        try {

            $order = new Order();
            $order->total = $request->total;
            $order->state = 'En revisión';
            $order->wholesale = false;

            if (Auth::check()) {
                $order->user_id = Auth::user()->id;
            }

            if ($request->has('direccion_seleccionada')) {
                $address = Address::where('id', $request->direccion_seleccionada)->first();
                $order->address_id = $address->id;
            } else {
                $request->validate([
                    'calle' => 'required|string|max:255',
                    'estadoEnvio' => 'required|string|max:255',
                    'num_ext' => 'required|string|max:5',
                    'num_int' => 'nullable|string|max:5',
                    'municipioEnvio' => 'required|string|max:255',
                    'colonia' => 'required|string|max:255',
                    'cp' => 'required|digits:5',
                ]);

                $addressNueva = new Address();
                $addressNueva->calle = $request->calle;
                $addressNueva->estado = $request->estadoEnvio;
                $addressNueva->municipio = $request->municipioEnvio;
                $addressNueva->num_ext = $request->num_ext;
                $addressNueva->num_int = $request->num_int;
                $addressNueva->colonia = $request->colonia;
                $addressNueva->cp = $request->cp;
                $addressNueva->save();

                $order->address_id = $addressNueva->id;
            }

            $carrito = Session::get('carrito', []);

            $order->save();

            //dd($order->id);
            foreach ($carrito as $producto) {

                $atributos = [];
                $atributosString = '';

                if (isset($producto['materialEndurance'])) {
                    $materialEndurance = Material::find($producto['materialEndurance']);
                    if ($materialEndurance) {
                        $atributos[] = $materialEndurance->material;
                    }
                }

                if (isset($producto['enduranceMaterial'])) {
                    $enduranceMaterial = Endurance::find($producto['enduranceMaterial']);
                    if ($enduranceMaterial) {
                        $atributos[] = $enduranceMaterial->endurance;
                    }
                }

                if (isset($producto['material'])) {
                    $material = Material::find($producto['material']);
                    if ($material) {
                        $atributos[] = $material->material;
                    }
                }

                if (isset($producto['lengthWeight'])) {
                    $lengthWeight = Length::find($producto['lengthWeight']);
                    if ($lengthWeight) {
                        $atributos[] = $lengthWeight->length;
                    }
                }

                if (isset($producto['weightLength'])) {
                    $weightLength = Weight::find($producto['weightLength']);
                    if ($weightLength) {
                        $atributos[] = $weightLength->weight;
                    }
                }

                if (isset($producto['weight'])) {
                    $weight = Weight::find($producto['weight']);
                    if ($weight) {
                        $atributos[] = $weight->weight;
                    }
                }

                if (isset($producto['length'])) {
                    $length = Length::find($producto['length']);
                    if ($length) {
                        $atributos[] = $length->length;
                    }
                }

                if (isset($producto['size'])) {
                    $size = Size::find($producto['size']);
                    if ($size) {
                        $atributos[] = $size->size;
                    }
                }

                if (isset($producto['wholesale'])) {
                    $wholesale = Wholesale::find($producto['wholesale']);
                    if ($wholesale) {
                        $atributos[] = $wholesale->wholesale;
                    }
                }

                $atributosString = implode(', ', $atributos);

                $detail = new Detail();
                $detail->product_id = $producto['id'];
                $detail->order_id = $order->id;
                $detail->quantity = $producto['cantidad'];
                $detail->total = $producto['cantidad'] * $producto['precio'];
                $detail->description = $atributosString;

                $detail->save();
            }


            // Si todo va bien, hacemos el commit de la transacción
            DB::commit();
        } catch (\Exception $e) {
            // Si ocurre un error, revertimos todos los cambios
            DB::rollBack();
            // Puedes manejar el error aquí, como mostrar un mensaje o loguearlo
            throw $e; // O manejarlo según tus necesidades
        }

        //Session::put('carrito', []);
        /*if ($request->has('tarjeta_seleccionada')) {
            $tarjeta = Card::where('id', $request->tarjeta_seleccionada)->first();
        } else {
            $request->validate([
                'num_tarjeta' => 'required|string|unique:cards|min:16|max:16',
                'owner' => 'required|string|max:255',
                'mes' => 'required|string|max:2|min:2',
                'anio' => 'required|string|max:2|min:2',
                'cvv' => 'required|string|max:4|min:3',
            ]);

            $card = Card::create([
                'num_tarjeta' => $request->num_tarjeta,
                'owner' => $request->owner,
                'mes' => $request->mes,
                'anio' => $request->anio,
                'cvv' => $request->cvv,
                'last_digits' => substr($request->num_tarjeta, -4),
            ]);


        }*/

        Session::forget('carrito');
        return redirect()->route('ProcesarPedido')->with('success', 'Pedido correctamente realizado');
    }

    public function processPayment(Request $request)
    {

        try {

            MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));

            $client = new PaymentClient();
            $request_options = new RequestOptions();
            $request_options->setCustomHeaders([
                "x-idempotency-key" => uniqid()
            ]);

            $createRequest = [
                "token" => $request->token,
                //"issuer_id" => $request->issuer_id,
                //"payment_method_id" => $request->payment_method_id,
                "transaction_amount" => $request->transaction_amount,
                "installments" => $request->installments,
                "payer" => [
                    "email" => 'siempregabo2016@gmail.com',
                ],
            ];


            // Crear el pago
            $response = $client->create($createRequest, $request_options);

            // Comprobar si la respuesta es correcta
            if ($response->status === "approved") {

                Session::put('payment_id', $response->id);

                return response()->json([
                    'success' => true,
                    'token' => $request->token,
                    'status' => $response->status,  // Estado del pago (approved, rejected, etc.)
                    'status_detail' => $response->status_detail,  // Detalle del estado
                    'payment_id' => $response->id,  // ID del pago
                    'transaction_amount' => $response->transaction_amount,  // Monto de la transacción
                    'payer_email' => $response->payer->email,  // Correo del pagador
                    'last_four_digits' => $response->card->last_four_digits,  // Últimos 4 dígitos de la tarjeta
                    'payment_method' => $response->payment_method_id,  // Método de pago
                    'date_approved' => $response->date_approved,  // Fecha de aprobación
                ], 201);
                /*
            $data['status'] = $response->status;
            $data['status_detail'] = $response->status_detail;
            $data['payment_id'] = $response->id;
            $data['transaction_amount'] = $response->transaction_amount;
            $data['payer_email'] = $response->payer->email;
            $data['last_four_digits'] = $response->card->last_four_digits;
            $data['payment_method'] = $response->payment_method_id;
            $data['date_approved'] = $response->date_approved;

            return view('authorized',$data);
        */
                /*return response()->json([
            'success' => true,
            'payment_id' => $response['id'],
            'status' => $response['status'],
            'data' => $response,
        ]);*/
            } else {
                //return redirect()->back()->withErrors(['' => '']);
                return response()->json([
                    'success' => false,
                    'message' => 'Error al procesar el pago',
                    'status' => $response->status,  // Estado del pago (approved, rejected, etc.)
                    'status_detail' => $response->status_detail,  // Detalle del estado
                    'transaction_amount' => $response->transaction_amount,  // Monto de la transacción
                    'payer_email' => $response->payer->email,  // Correo del pagador
                    'details' => $response,
                ], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e,
            ], 500);
        }
    }

    public function procesarDescuento(Request $request)
    {
        $codigo = $request->input('Codigo');
        //dd($codigo);

        $descuento = Code::where('code', $codigo)->first();
        $carrito = Session::get('carrito', []);
        $descuentoTotal = 0;
        $subtotal = 0;
        $total = 0;

        if ($descuento) {
            if (preg_match('/B.*E.*G.*V/i', $codigo)) {
                foreach ($carrito as &$producto) {
                    $category = $producto['category'];
                    if ($category === '5' || $category === '3' || $category === '2') {
                        $descuentoTotal += ($producto['precio'] * $producto['cantidad']) * 0.05;
                    } else {
                        $descuentoTotal += ($producto['precio'] * $producto['cantidad']) * 0.03;
                    }
                    $subtotal += $producto['precio'] * $producto['cantidad'];
                }
                $total = $subtotal - $descuentoTotal;
                return response()->json([
                    'success' => true,
                    'descuentoTotal' => $descuentoTotal,
                    'total' => $total
                ]);
            }
            //if($codigo === 'FREEDELIVERY2024'){                }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Código de descuento no válido.'
            ]);
        }
    }

    public function createCardToken(Request $request)
    {
        // Configurar la API de Mercado Pago
        MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));
        //MercadoPagoClient::setAccessToken
        $card = Card::find($request->card_id);





        $cardToken = new CardTokenClient();
        $requestOptions = new RequestOptions();
        $requestOptions->setCustomHeaders([
            "x-idempotency-key" => uniqid() // Clave única para la idempotencia
        ]);

        // Crear la solicitud
        $createRequest = [
            "cardNumber" => decrypt($card->num_tarjeta),
            "cardExpirationMonth" => $card->mes,
            "cardExpirationYear" => $card->anio,
            //"expirationDate" => $card->fvc, // Formato "MM/YY"
            "securityCode" => decrypt($card->cvv),
            "cardholderName" => $card->owner,
        ];

        try {
            $response = $cardToken->create($createRequest, $requestOptions);

            return response()->json(['token' => $response->id], 200);
        } catch (\Exception $e) {
        }
    }
}
