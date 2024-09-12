<?php

namespace App\Console\Commands;

use App\Services\GoogleService;
use Google\Exception;
use Google\Service;
use Google\Service\Sheets;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Userbirthday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:userbirthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $googleService = new GoogleService;

        try {
            $client = $googleService->getClient();
        } catch (Exception $e) {
            Log::error('Ошибка получения клиента: '.$e->getMessage());

            return 0;
        }
        $service = new Sheets($client);

        $spreadsheetId = config('google.spreadsheet_id');
        $range = config('google.sheet_name');

        try {
            $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        } catch (Service\Exception $e) {
            Log::error('Ошибка чтения таблицы: '.$e->getMessage());

            return 0;
        }
        $values = $response->getValues();

        if (empty($values)) {
            $this->info('No data found.');
        } else {
            foreach ($values as $index => $row) {
                if ($index === 0) {
                    continue;
                }
                $fullName = $row[2] ?? null;
                $birthday = $row[3] ?? null;
                $lastContact = $row[7] ?? null;

                if ($birthday) {
                    $googleService->checkBirthdays($fullName, $birthday);
                }

                if ($lastContact) {
                    $googleService->checkLastContact($fullName, $lastContact);
                }
            }
        }
    }
}
