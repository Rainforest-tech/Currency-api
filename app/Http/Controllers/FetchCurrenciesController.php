<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;


class FetchCurrenciesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $response = Http::get('https://www.cbr-xml-daily.ru/daily_json.js');
        $currencies = $response->collect('Valute');
        $currencies->each(function ($currency) {
            $this->saveCurrency($currency);
        });

        return response('', Response::HTTP_OK);

    }

    private function saveCurrency($data)
    {
        $currency = Currency::query()->updateOrCreate(
            ['char_code' => $data['CharCode']],
            [
                'name' => $data['Name'],
                'rate' => $data['Value'] / $data['Nominal'],
                'updated_at' => now(),
            ]
        );

        $currency->history()->create(['date' => now(), 'rate' => $data['Value'] / $data['Nominal'] ]);

    }


}
