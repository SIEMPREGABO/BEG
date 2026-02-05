@section('name', 'Autorizado')

<x-app-layout>
    <div class="p-20 my-10">
    <div id="statusScreenBrick_container"></div>
    </div>
    <script>
        const mp = new MercadoPago("{{ config('services.mercadopago.public_key') }}", {
            locale: 'es-MX'
        });
        const bricksBuilder = mp.bricks();
        const renderStatusScreenBrick = async (bricksBuilder) => {
            const settings = {
                initialization: {
                    paymentId: {{ $payment_id }}, // Payment identifier, from which the status will be checked
                },
                customization: {
                    visual: {
                        hideStatusDetails: true,
                        hideTransactionDate: true,
                        style: {
                            theme: 'default', // 'default' | 'dark' | 'bootstrap' | 'flat'
                        }
                    },
                    backUrls: {
                        'error': 'http://begv1.test/Carrito',
                        'return': 'http://begv1.test/'
                    }

                },
                callbacks: {
                    onReady: () => {
                        // Callback called when Brick is ready
                    },
                    onError: (error) => {
                        // Callback called for all Brick error cases
                    },
                },
            };
            window.statusScreenBrickController = await bricksBuilder.create('statusScreen',
                'statusScreenBrick_container', settings);
        };
        renderStatusScreenBrick(bricksBuilder);
    </script>
</x-app-layout>
