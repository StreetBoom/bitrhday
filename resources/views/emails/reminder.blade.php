<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Напоминание о последнем общении</title>
    <style>
        .container {
            font-family: Arial, sans-serif;
            margin: 0 auto;
            padding: 20px;
            max-width: 600px;
            background-color: #f4f4f4;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 16px;
            color: #555;
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Напоминание: прошло 2 недели с последнего общения!</h1>
    <p>Привет,</p>
    <p>С пользователем {{ $fullName }} не было общения более 2 недель. Последний раз вы общались {{ $lastContactDate }}.</p>
    <p>Рекомендуем вам связаться с ним для поддержания хороших отношений.</p>
    <a href="#" class="button">Связаться с {{ $fullName }}</a>
</div>
</body>
</html>
