<!-- resources/views/emails/notificacion_pedido.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación de Pedido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            padding: 20px;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        h1 {
            color: #4CAF50;
        }
        p, .order-details {
            font-size: 16px;
        }
        .order-details {
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .order-item {
            margin: 10px 0;
        }
        .total {
            font-size: 18px;
            font-weight: bold;
            color: #4CAF50;
            text-align: right;
        }
        .btn {
            background-color: #4CAF50;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo de la empresa -->
        <img src="{{ $message->embed(public_path() .$pathToImage) }}" alt="Logo" class="logo">

        <!-- Título y agradecimiento -->
        <h1>¡Gracias por tu pedido!</h1>
        <!--p>Hola  clienteNombre ,</p-->
        <p>Tu pedido ha sido recibido con éxito. A continuación, te compartimos los detalles de tu compra:</p>

        <!-- Detalles del pedido -->
        <div class="order-details">
            <p><strong>Número de Pedido:</strong> #{{  $order->id }}</p>
            <p><strong>Fecha:</strong> {{ $order->created_at }}</p>
            <p><strong>Productos:</strong></p>
            @foreach($carrito as $producto)
                <div class="order-item">
                    - {{ $producto['nombre'] }} x{{ $producto['cantidad'] }} - ${{ $producto['precio'] }}
                </div>
            @endforeach
            <div class="total">
                Total: ${{ $order->total }}
            </div>
        </div>

        <!-- Enlace para ver el estado del pedido -->
        <a href="{{ url('/misPedidos/') }}" class="btn">Ver estado del pedido</a>

        <!-- Mensaje de contacto -->
        <p>Si tienes alguna pregunta, no dudes en <a href="{{ url('/Contacto') }}">contactarnos</a>.</p>
        <p>Gracias por confiar en nosotros.</p>
    </div>
</body>
</html>
