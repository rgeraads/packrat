<?php

namespace Packrat\ExchangeRate;

use Assert\Assertion as Assert;
use GuzzleHttp\ClientInterface;
use Money\Currency;

final class ExchangeRateRetriever
{
    const EXCHANGE_RATE_API_URL = 'http://free.currencyconverterapi.com';
    const TO_CURRENCY           = 'EUR';

    /**
     * @var float[]
     */
    private $exchangeRates = [];

    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param Currency $currency
     *
     * @return float
     */
    public function getFor(Currency $currency): float
    {
        $this->retrieveExchangeRateFor($currency);

        return $this->exchangeRates[$currency->getCode()];
    }

    /**
     * Refreshes exchange rates from free.currencyconverterapi.com
     *
     * @param Currency $currency
     */
    private function retrieveExchangeRateFor(Currency $currency)
    {
        $conversion = sprintf('%s_%s', $currency, self::TO_CURRENCY);

        $response = $this->client->request('GET', self::EXCHANGE_RATE_API_URL . '/api/v3/convert', [
            'query' => ['q' => $conversion]
        ]);

        Assert::same($response->getStatusCode(), 200);

        $rawExchangeRates = $response->getBody();;
        $exchangeRates = json_decode($rawExchangeRates, true);

        Assert::keyExists('results', $exchangeRates);
        Assert::keyExists($conversion, $exchangeRates['results']);
        Assert::keyExists('val', $exchangeRates['results'][$conversion]);

        $this->exchangeRates[$currency->getCode()] = $exchangeRates['results'][$conversion]['val'];
    }
}
