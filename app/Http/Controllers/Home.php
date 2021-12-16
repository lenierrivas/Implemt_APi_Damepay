<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class Home extends Controller
{

    public function index(Request $request)
    {
        return view('welcome');
    }

    public function getStatusFlutterwave(Request $request)
    {
        $client = new \GuzzleHttp\Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                // 'Authorization' => 'Bearer DPSECK-6lcu7mWanSc0da9N65yzDbmbenO71xuV-8I'
                'Authorization' => 'Bearer ' . $request['token']
                ]
        ]);

        $response = $client->request(
            'GET',
            'https://damepay.com/dashboard/api/paymentLinks/'
        );

        $response = json_decode($response->getBody(), true);

        $data = $response['data'];
        // echo '<pre>'; print_r($data); echo '</pre>'; die();

        return view('welcome', compact('data'));
    }



    public function createpostdame(Request $request)
    {
    // echo '<pre>'; print_r($request->all()); echo '</pre>'; die();

        $client = new \GuzzleHttp\Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                // 'Authorization' => 'Bearer DPSECK-6lcu7mWanSc0da9N65yzDbmbenO71xuV-8I'
                'Authorization' => 'Bearer ' . $request['token']
                ]
        ]);

        $response = $client->request(
            'POST',
            'https://damepay.com/dashboard/api/paymentLinks/create',
            [
                'json' => [
                    'link_name' => $request['name'],
                    'type_link' => 'Single Charge',
                    'amount'    => $request['amount'],
                    'currency'  => $request['currency'],
                    'details'   => $request['details'],
                ]
            ]
        );

        $clientt = new \GuzzleHttp\Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                // 'Authorization' => 'Bearer DPSECK-6lcu7mWanSc0da9N65yzDbmbenO71xuV-8I'
                'Authorization' => 'Bearer ' . $request['token']
                ]
        ]);

        $responses = $clientt->request(
            'GET',
            'https://damepay.com/dashboard/api/paymentLinks/'
        );

        $responses = json_decode($responses->getBody(), true);

        $data = $responses['data'];

        return view('welcome', compact('data'));
    }
}
