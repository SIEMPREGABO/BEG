<!-- resources/views/emails/verificacion.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica tu cuenta</title>
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
        .btn {
            background-color: #4CAF50;
            color: #ffffff;
            
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Imagen del logo -->
        <!--img src="{//{ asset('images/Logo_BEG.png') }}" alt="Logo" class="logo"-->
        <img src="{{ $message->embed(public_path() .$pathToImage) }}">
        <h1>¡Hola, {{ $nombre_pila }}!</h1>
        <p>Gracias por registrarte en nuestra plataforma. Para completar el registro, por favor verifica tu correo haciendo clic en el siguiente enlace:</p>
        <a href="{{ url('/verificar-correo/' . $token) }}" class="btn">Verificar mi correo</a>
        <p>Si no te has registrado en nuestra plataforma, por favor ignora este correo.</p>
    </div>
</body>
</html>
