<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сегодня день рождения!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: white;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #E74C3C;
        }
        p {
            font-size: 16px;
            color: #34495E;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #2980B9;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Сегодня день рождения у {{ $fullName }}!</h1>
    <p>Привет,</p>
    <p>Сегодня у {{ $fullName }} день рождения! Пожелайте ему всего самого наилучшего.</p>
    <a href="#" class="button">Поздравить сейчас</a>
</div>
</body>
</html>
