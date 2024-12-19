@section('name', 'Pago')

<x-app-layout>
    <div class="md:py-24 py-32 ">
        <div class="flex justify-center bg-black bg-opacity-50 rounded-lg">
            <div class=" max-w-2xl w-full antialiased   flex flex-col justify-center items-center py-10">
                <div class="w-full p-6 my-10 md:my-0">
                    <h1 class="text-2xl  font-bold mb-6">Proceso de pago</h1>




                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-gray-500 dark:text-gray-400">Descuentos</dt>
                        <dd class="text-base font-medium text-green-500">
                            <p id="descuento" name="descuento">${{ $descuentoTotal }}</p>
                        </dd>
                    </dl>

                    <dl
                        class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                    </dl>

                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-gray-500 dark:text-gray-400">Subtotal</dt>
                        <dd class="text-base font-medium text-gray-500 dark:text-white">${{ $subtotal }}</dd>
                    </dl>

                    <dl
                        class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                    </dl>

                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-gray-500 dark:text-gray-400">Envío</dt>
                        <dd class="text-base font-medium text-gray-500 dark:text-white">
                            @if ($envio === 0)
                                Fuera del radar, nos contactaremos contigo
                            @else
                                ${{ $envio }}
                            @endif
                        </dd>
                    </dl>

                    <dl
                        class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                    </dl>

                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-gray-500 dark:text-gray-400">Total</dt>
                        <dd class="text-base font-medium text-gray-500 dark:text-white">${{ $total }}</dd>
                    </dl>
                    <dl
                        class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                    </dl>

                </div>

                <!--
                if (isset($cards))
                    <form method="POST" action="{//{ route('ProcesarPago') }}">
                        csrf
                        <div class="   p-5 w-full">
                            <h4 class="text-lg font-semibold  text-white ">Método de pago</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 grid- gap-4">
                                foreach ($cards as $card)
                                    <div class="my-3 w-full">
                                        <div class=" w-full lg:max-w-full lg:flex ">
                                            <div
                                                class="bg-white w-full rounded-md p-4  flex flex-col justify-between leading-normal ">
                                                <div class=" ">
                                                    <p class="text-sm text-gray-600 flex items-center">
                                                        <input type="radio" class="justify-start"
                                                            id="tarjeta_seleccionada" name="tarjeta_seleccionada"
                                                            value="{//{ $card->id }}" />
                                                        &nbsp
                                                        **** ****
                                                        **** {//{ $card->last_digits }}
                                                    </p>

                                                    <div class="text-gray-900 font-bold text-xl mb-2"> </div>
                                                    <p class="text-gray-700 text-base">
                                                        <strong>FDV:</strong>
                                                        {//{ $card->mes }}
                                                        / {//{ $card->anio }}<br>
                                                    </p>
                                                </div>
                                                <div class="flex flex-wrap items-center ">

                                                    <div class="text-sm w-1/2">
                                                        <p class="text-gray-900 leading-none">Owner</p>
                                                        <p class="text-gray-600">{//{ $card->owner }}</p>
                                                    </div>
                                                    <div class="flex justify-end w-1/2 text-black p-4">
                                                        <div class="px-1">CVV</div>
                                                        <input type="password"
                                                            class="justify-start  p-1 border-solid text-black border-2 rounded-md bor text-xs border-black"
                                                            id="cvv" name="cvv"
                                                            placeholder="Introduzca el CVV" max="4"
                                                            min="3" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                endforeach
                            </div>
                        </div>
                        <input type="hidden" value="{//{ $total }}" id='transaction_amount' name="transaction_amount"/>

                        <button type="submit" id="submit_card_button" name="submit_card_button">Procesar pago</button>
                    </form>
                    <div class="w-full flex items-center justify-start p-4">
                        <input type="radio" class="px-2" id="other-payment-method" name="other-payment-method"
                            value="other">
                        <label for="other-payment-method" class="text-white px-2">Otra forma de pago</label>
                    </div>
                else
                    <div id="cardPaymentBrick_container"></div>
                    <div id="payment-status"></div>
                endif
                -->



                <!-- Brick de Mercado Pago -->

                <div id="cardPaymentBrick_container"></div>
                <div id="payment-status"></div>


            </div>
        </div>
    </div>
    <script>
        const mp = new MercadoPago("{{ config('services.mercadopago.public_key') }}", {
            locale: 'es-MX'
        });
        const bricksBuilder = mp.bricks();
        const renderCardPaymentBrick = async (bricksBuilder) => {
            //console.log(bricksBuilder);
            const settings = {
                initialization: {
                    amount: {{ $total }}, // monto a ser pago
                    payer: {
                        email: "",
                    },
                },
                customization: {
                    visual: {},
                    paymentMethods: {
                        maxInstallments: 1,
                    }
                },
                callbacks: {
                    onReady: () => {
                        // callback llamado cuando Brick esté listo
                    },
                    onSubmit: (cardFormData) => {
                        //  callback llamado cuando el usuario haga clic en el botón enviar los datos
                        //  ejemplo de envío de los datos recolectados por el Brick a su servidor
                        fetch("{{ route('ProcesarPago') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-Token": "{{ csrf_token() }}"
                                },
                                body: JSON.stringify(cardFormData)
                            })
                            .then(response => response.json())
                            .then(data => {
                                //console.log(data);
                                if (data.success) {
                                    //console.log(data.token);
                                    // Redirige a una ruta específica cuando la respuesta sea exitosa
                                    window.location.href = "{{ route('ConfirmarPedido') }}";
                                } else {
                                    window.location.href = "{{ route('ConfirmarPedido') }}";
                                }

                            })
                            .catch(error => {
                                //window.location.href = "{{ route('ConfirmarPedido') }}";
                            });

                    },
                    onError: (error) => {
                        // callback llamado para todos los casos de error de Brick
                    },
                },
            };
            window.cardPaymentBrickController = await bricksBuilder.create('cardPayment',
                'cardPaymentBrick_container', settings);
        };



        renderCardPaymentBrick(bricksBuilder);
    </script>
    @vite(['resources/js/payment.js'])
</x-app-layout>
