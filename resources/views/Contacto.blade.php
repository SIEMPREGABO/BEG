<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo mensaje de contacto</title>
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
        p {
            font-size: 16px;
        }
        .details {
            margin-top: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border-left: 4px solid #4CAF50;
        }
        .details p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nuevo mensaje de contacto</h1>
        <p>Has recibido un nuevo mensaje a través del formulario de contacto. A continuación se muestran los detalles:</p>

        <div class="details">
            <p><strong>Nombre:</strong> {{ $nombre }}</p>
            <p><strong>Correo electrónico:</strong> {{ $email }}</p>
            <p><strong>Teléfono:</strong> {{ $phone }}</p>
            <p><strong>Mensaje:</strong></p>
            <p>{{ $body }}</p>
        </div>

        <p>Por favor, responde a este mensaje lo antes posible.</p>
    </div>
</body>
</html>
