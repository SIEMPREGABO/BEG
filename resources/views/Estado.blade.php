<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado de tu compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            background-color: #4CAF50;
            color: white;
            padding: 10px 0;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
        }
        .details {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }
        .details th, .details td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .details th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Actualización de tu compra</h1>
        </div>
        <div class="content">
            <p>Hola</p>
            <p>Te informamos que el estado de tu compra ha cambiado a:</p>
            <p><strong>{{ $order->state }}</strong></p>

            <h3>Detalles de tu compra:</h3>
            <table class="details">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->details as $detail)
                        <tr>
                            <td>{{ $detail->product->nombre }}</td>
                            <td>{{ $detail->quantity }}</td>
                           
                            <td>${{ number_format($detail->quantity * $detail->total, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Total de la compra: ${{ $order->total }}</h3>
        </div>
        <div class="footer">
            <p>Gracias por comprar con nosotros. Si tienes alguna pregunta, no dudes en contactarnos.</p>
        </div>
    </div>
</body>
</html>
