<h1 align="center">Скрипт уведомлений о днях рождения и необходимости общения</h1>

<p align="center">
  <strong>Проект на Laravel 11.9, который отправляет уведомления по электронной почте, основываясь на днях рождения пользователей и истории общения.</strong>
</p>

## Описание

<p>Данный проект на Laravel предназначен для отправки уведомлений при выполнении следующих условий:</p>

<ul>
  <li><strong>Напоминания о днях рождения:</strong>
    <ul>
      <li>Отправка уведомления в день рождения пользователя.</li>
      <li>Отправка уведомления за 2 недели до дня рождения.</li>
    </ul>
  </li>
  <li><strong>Напоминания о необходимости общения:</strong>
    <ul>
      <li>Отправка уведомления, если с пользователем не было общения в течение 2 недель или более.</li>
    </ul>
  </li>
</ul>

## Особенности

<ul>
  <li><strong>Интеграция с Google Sheets:</strong> Чтение данных напрямую из файла Google Sheets без использования базы данных.</li>
  <li><strong>Уведомления по дням рождения:</strong> Уведомление в день рождения пользователя и за 2 недели до.</li>
  <li><strong>Уведомления об отсутствии общения:</strong> Уведомление, если с пользователем не было общения более 2 недель.</li>
</ul>

## Требования

<ul>
  <li><strong>PHP:</strong> 8.2</li>
  <li><strong>Laravel:</strong> 11.9</li>
  <li><strong>Docker</strong></li>
</ul>

## Установка

<ol>
  <li>Склонируйте репозиторий:
    <pre><code>git clone <URL вашего репозитория>
cd <имя папки проекта></code></pre>
  </li>

  <li>Установите зависимости проекта:
    <pre><code>composer install</code></pre>
  </li>

  <li>Скопируйте файл окружения и настройте его:
    <pre><code>cp .env.example .env</code></pre>
  </li>

  <li>Укажите почту для отправки уведомлений:
    <pre><code>NOTIFICATION_EMAIL="your-email@example.com"</code></pre>
  </li>

  <li>Сгенерируйте ключ приложения:
    <pre><code>php artisan key:generate</code></pre>
  </li>

  <li>Соберите и запустите контейнеры Docker:
    <pre><code>docker-compose up --build -d</code></pre>
  </li>

  <li>заполните id гугл таблицы в <code>.env</code> файле:
    <pre><code>GOOGLE_SPREADSHEET_ID=1sUYKWLWFSBAvXrsSPoF5bwO7KiFKWQ5w2R1vNBvIn8A</code></pre>
  </li>

<li>заполните название листа из гугл таблицы в <code>.env</code> файле:
    <pre><code>GOOGLE_SHEET_NAME=Users</code></pre>
  </li>

<li>Укажите путь к файлу Google Sheets в <code>.env</code> файле:
    <pre><code>GOOGLE_CREDENTIALS_PATH=storage/credentials/google_sheets.json</code></pre>
  </li>
</ol>



## Использование

<p>Для выполнения команды по проверке условий для отправки уведомлений ежедневно, настройте cron или используйте встроенный механизм Laravel для выполнения задач по расписанию:</p>

<ol>
  <li>Настройте команду в <code>app/Console/Kernel.php</code>:
    <pre><code>$schedule->command('send:notifications')->daily();</code></pre>
  </li>
  <li>Выполните команду вручную для тестирования:
    <pre><code>php artisan send:notifications</code></pre>
  </li>
</ol>

## Контейнеризация

<p>Проект настроен для работы с Docker. Для запуска используйте:</p>
<pre><code>docker-compose up --build -d</code></pre>

## Пример .env файла

<pre><code>APP_NAME="Notification Script"
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost

GOOGLE_SHEET_URL="https://docs.google.com/spreadsheets/d/..."
NOTIFICATION_EMAIL="your-email@example.com"

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"</code></pre>

## Документация

<p>Подробную информацию о Laravel можно найти в официальной <a href="https://laravel.com/docs">документации Laravel</a>.</p>
