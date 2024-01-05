<?php

namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class CurrencyService
{
    /**
     * @throws GuzzleException
     */
    public function getCoinToBRL($coin= "EUR-BRL")
    {

        $client = new Client();

        $response = $client->get("https://economia.awesomeapi.com.br/last/{$coin}");

        if ($response->getStatusCode() === 200) {

            $data = json_decode($response->getBody(), true);

            $key = str_replace("-", "", $coin);

            return $data[$key]['bid'];
        } else {

            return  ["status"=>false, "error" => "Falha ao acessar a API"];
        }
    }

    public function getFii(string $string)
    {
        $client = new Client();
        $response = $client->get("https://brapi.dev/api/quote/{$string}?modules=summaryProfile&token=mErtUFyYXhYHFNN5c792aL");

        if ($response->getStatusCode() === 200) {

            $data = json_decode($response->getBody(), true);

            return $data['results'][0];
        } else {

            return  ["status"=>false, "error" => "Falha ao acessar a API"];
        }


      /*  {
            "results": [
    {
        "symbol": "PETR4", // Ticker
      "currency": "BRL", // Moeda
      "twoHundredDayAverage": 29.55485, // Média de 200 dias
      "twoHundredDayAverageChange": 7.1551495, // Variação da média de 200 dias
      "twoHundredDayAverageChangePercent": 0.2420973, // Variação percentual da média de 200 dias
      "marketCap": 497695817728, // Capitalização de mercado
      "shortName": "PETROBRAS   PN      N2", // Nome da empresa
      "longName": "Petróleo Brasileiro S.A. - Petrobras", // Nome longo da empresa
      "regularMarketChange": 1.1599998, // Variação do preço diário
      "regularMarketChangePercent": 3.2630093, // Variação percentual do preço diário
      "regularMarketTime": "2023-11-17T21:07:47.000Z", // Data e hora do último preço
      "regularMarketPrice": 36.71, // Preço atual
      "regularMarketDayHigh": 36.82, // Preço máximo do dia
      "regularMarketDayRange": "35.51 - 36.82", // Faixa de preço do dia
      "regularMarketDayLow": 35.51, // Preço mínimo do dia
      "regularMarketVolume": 87666300, // Volume do dia
      "regularMarketPreviousClose": 35.55, // Preço de fechamento do dia anterior
      "regularMarketOpen": 35.83, // Preço de abertura do dia
      "averageDailyVolume3Month": 49987483, // Volume médio dos últimos 3 meses
      "averageDailyVolume10Day": 54835377, // Volume médio dos últimos 10 dias
      "fiftyTwoWeekLowChange": 36.71, // Variação do preço em relação ao mínimo dos últimos 52 semanas
      "fiftyTwoWeekRange": "32.21 - 38.86", // Faixa de preço dos últimos 52 semanas
      "fiftyTwoWeekHighChange": -2.1500015, // Variação do preço em relação ao máximo dos últimos 52 semanas
      "fiftyTwoWeekHighChangePercent": -0.055326853, // Variação percentual do preço em relação ao máximo dos últimos 52 semanas
      "fiftyTwoWeekLow": 32.21, // Preço mínimo dos últimos 52 semanas
      "fiftyTwoWeekHigh": 38.86, // Preço máximo dos últimos 52 semanas
      "priceEarnings": 3.49722289, // Preço da ação / Lucro por ação
      "earningsPerShare": 10.4968915, // Lucro por ação
      "logourl": "https://s3-symbol-logo.tradingview.com/brasileiro-petrobras--big.svg", // URL do logo
      "usedInterval": "1d", // Intervalo de tempo utilizado quando ?interval=1d
      "usedRange": "5d", // Intervalo de tempo utilizado quando ?range=5d
     */

    }


}