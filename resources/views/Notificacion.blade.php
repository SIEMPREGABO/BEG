<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEG</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 5px;
            overflow: hidden;
        }
        .header {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            padding: 15px 20px;
            font-size: 20px;
            font-weight: bold;
        }
        .body {
            padding: 20px;
            color: #333333;
            line-height: 1.6;
        }
        .image {
            text-align: center;
            margin: 20px 0;
        }
        .footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 15px 20px;
            font-size: 14px;
            color: #555555;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            {{ $header }}
        </div>

        <!-- Body -->
        <div class="body">
            {!! $body !!}
        </div>

        <!-- Image -->
        @if ($imagePath)
            <div class="image">
                <img src="{{ $message->embed(public_path() .$imagePath) }}" alt="Image" style="max-width: 100%; height: auto; border-radius: 5px;">
            
            </div>
        @endif

        <!-- Footer -->
        <div class="footer">
            {{ $footer }}
        </div>
    </div>
</body>
</html>
