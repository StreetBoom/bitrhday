<?php

namespace App\Services;

use Google\Client;
use Google\Exception;
use Google\Service\Sheets;
use Illuminate\Support\Facades\Mail;

class GoogleService
{
    /**
     * @throws Exception
     */
    public function getClient(): Client
    {
        $client = new Client;
        $client->setApplicationName('Birthday Notifications');
        $client->setScopes(Sheets::SPREADSHEETS_READONLY);
        $client->setAuthConfig(config('google.credentials_path'));
        $client->setAccessType('offline');

        return $client;
    }

    /**
     * @param string $fullName
     * @param string $birthday
     * @return void
     */
    public function checkBirthdays(string $fullName, string $birthday): void
    {
        $today = date('d.m');
        $birthdayDate = date('d.m', strtotime($birthday));
        $twoWeeksBefore = date('d.m', strtotime($today.' -14 days'));

        if ($birthdayDate == $twoWeeksBefore) {

            Mail::send('emails.birthTwoWeek', ['fullName' => $fullName], function ($message) {
                $message->to('test@example.com')->subject('Напоминание о дне рождения');
            });
        }
        if ($today == $birthdayDate) {

            Mail::send('emails.birthday', ['fullName' => $fullName], function ($message) {
                $message->to('test@example.com')->subject('Напоминание о дне рождения');
            });
        }
        sleep(1);
    }

    /**
     * @param string $fullName
     * @param string $lastContact
     * @return void
     */
    public function checkLastContact(string $fullName, string $lastContact): void
    {
        $lastContactDate = date('d-m-Y', strtotime($lastContact));
        $twoWeeksAgo = date('d-m-Y', strtotime('-14 days'));

        if ($lastContactDate < $twoWeeksAgo) {
            Mail::send('emails.reminder', ['fullName' => $fullName, 'lastContactDate' => $lastContactDate], function ($message) {
                $message->to('test@example.com')->subject('Напоминание о последнем сообщение');
            });
            sleep(1);
        }
    }
}
