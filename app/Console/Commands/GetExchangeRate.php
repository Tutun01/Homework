<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetExchangeRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:current-exchange-rate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command is used to print the current exchange rate';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = env("API_URL")."/fetch-multi";
        $response = Http::get($url, [
            'from' => 'RSD',
            'to' => 'EUR, USD',
            'api_key' => env("API_KEY"),
        ]);

        $data = $response->json();

        if (isset($data['results']))
        {
            $EURRate = $data['results']['EUR'];
            $USDRate = $data['results']['USD'];

            if ($EURRate && $USDRate)
            {
                $EURRate = round(1 / $EURRate, 2);
                $USDRate = round(1 / $USDRate, 2);
            }

            $this->info('Current exchange rate:');
            $this->line("EUR: $EURRate RSD");
            $this->line("USD: $USDRate RSD");
        }
    }
}
