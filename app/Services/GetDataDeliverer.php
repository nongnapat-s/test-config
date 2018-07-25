<?php
namespace App\Services;
use Log;
use GuzzleHttp\Client;
class GetDataDeliverer
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    public function getData(){
        Log::info(config('app.hedwig_host'));
        $client = new \GuzzleHttp\Client([
            'base_uri' => config('app.hedwig_host'),
            'verify' => false,
            'timeout'  => 8.0,
        ]);
        $response = $client->post('/chula', [
            'headers' => [
                'Accept' => 'application/json',
                'token' => config('app.hedwig_token'),
                'secret' =>config('app.hedwig_secret'),
        ],
            'form_params' => [
            'title' => config('app.hedwig_title'),
            'detail' => config('app.hedwig_detail'),
            ]
        ]);
        Log::info($response->getBody());
    }
}