<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{

    public function __construct(Currency $currency)
    {
        $this->currency = $currency;
    }

    public function index()
    {
        $currencies = $this->currency->get();
        return view('index', compact([
            'currencies'
        ]));
    }

    public function exchangeCurrency(Request $request)
    {
        $request->validate([
            'currency' => 'required'
        ]);

        $exchange = $this->getCurrencyByFixerIo($request);
        $currencies = $this->currency->get();

        return view('index', compact([
            'exchange',
            'currencies'
        ]));
    }

    private function getCurrencyByFixerIo ($request)
    {
        $base_url = Config::get('api.fixer_io_base_url');
        $client = new \GuzzleHttp\Client( [
            'base_uri' => $base_url,
        ] );
        $path = '/api/latest';
        $response = $client->request( 'GET', $path,
            [
                'query' => [
                    'access_key' => Config::get('api.fixer_io_access_key'),
                    'symbols' => $request->input('currency')
                ],
                'allow_redirects' => true,
            ]);

        return json_decode($response->getBody(), true);
    }
}