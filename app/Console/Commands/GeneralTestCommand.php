<?php

namespace App\Console\Commands;

use App\Models\SystemConfig;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class GeneralTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:general';

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
        $token = SystemConfig::where('key_code', 'zoho.access_token')->firstOrFail()->key_value;

        $service = new \App\Services\Zoho\Subscriptions\Subscriptions\ListSubscriptionsService($token, \config('services.zoho.currentOrganizationId'));

        dd(Arr::get($service(), 'data.subscriptions'));

        return 0;
    }
}
