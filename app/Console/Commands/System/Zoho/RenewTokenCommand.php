<?php

namespace App\Console\Commands\System\Zoho;

use App\Models\SystemConfig;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class RenewTokenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:zoho:renewjwt';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $config = SystemConfig::where('key_code', 'zoho.refresh_token')->firstOrFail();

        $this->line($config->key_value);

        $payload = [
            'refresh_token' => $config->key_value,
            'client_id' => \config('services.zoho.selfclient.id'),
            'client_secret' => \config('services.zoho.selfclient.secret'),
            'redirect_uri' => \config('services.zoho.redirectUrl'),
            'grant_type' => 'refresh_token',
        ];

        $this->newLine();
        $this->comment('New request: ');
        $this->newLine();
        $this->line('POST '.config('services.zoho.accounts.tokenUrl').' HTTP/1.1');
        $this->line('Content-Type: application/x-www-form-urlencoded');
        $this->line('Accept: application/json');
        $this->newLine();
        $this->line(http_build_query($payload));
        $this->newLine();

        $client = new Client([
            'http_errors' => false,
        ]);

        $response = $client->request('POST', config('services.zoho.accounts.tokenUrl'), [
            'headers' => [
                'Accept' => 'application/json',
            ],
            'form_params' => $payload,
        ]);

        $statusCode = (int) $response->getStatusCode();
        $headers = $response->getHeaders();
        $strBody = (string) $response->getBody();

        $this->comment('Response: ');
        $this->newLine();
        $this->line('HTTP/1.1 '.$statusCode.' '.$response->getReasonPhrase());
        foreach ($headers as $key => $value) {
            $this->line($key.': '.implode('', $value));
        }
        $this->newLine();
        $this->line($strBody);
        $this->newLine();

        $data = \json_decode($strBody, true);
        if ($statusCode == 200) {
            if (isset($data['access_token'])) {
                $modelAccessToken = SystemConfig::updateOrCreate(['key_code' => 'zoho.access_token'], [
                    'key_label' => 'Zoho Access Token',
                    'key_code' => 'zoho.access_token',
                    'key_value' => $data['access_token'],
                ]);
            }
        } else {
            throw new Exception($data['error'], -1);
        }

        return 0;
    }
}
