<?php

namespace App\Console\Commands;

use App\Currency;
use Illuminate\Console\Command;
use GuzzleHttp\Client;

class UpdateRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $privatURL = 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5';

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
        $client = new Client();
        $res = $client->get($this->privatURL );
        if($res->getStatusCode()==200){
            $currencies=json_decode($res->getBody(), true);
            if(!empty($currencies)) {
                Currency::insert($currencies);
            }
        }
    }
}
