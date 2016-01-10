<?php

namespace Packrat\Item;

use Assert\Assertion as Assert;

final class ExchangeRate
{
    /**
     * @var string
     */
    private $exchangeRatesUrl;

    /**
     * @var array[]
     */
    private $exchangeRates = ['EUR', 'USD', 'GBP', 'JPY'];

    /**
     * @var array[]
     */
    private $currencies = [];

    public function __construct(string $exchangeRatesUrl = 'http://free.currencyconverterapi.com')
    {
        $this->exchangeRatesUrl = $exchangeRatesUrl;
    }

    public function getForCurrency(string $currency): float
    {
        $currency = strtoupper($currency);

        $this->refresh($currency);

        Assert::inArray($currency, array_keys($this->exchangeRates));

        return $this->exchangeRates[$currency];
    }

    /**
     * Refreshes exchange rates from free.currencyconverterapi.com
     *
     * @param string $currency
     */
    public function refresh(string $currency)
    {
        if ($this->currencies) {
            Assert::inArray($currency, array_keys($this->currencies));
        }

        $currency = strtoupper($currency);

        $conversion = sprintf('%s_%s', $currency, 'EUR');

        $exchangeRatesUrl = sprintf('%s?q=%s', $this->exchangeRatesUrl . '/api/v3/convert', $conversion);

        $rawExchangeRates = file_get_contents($exchangeRatesUrl);
        $exchangeRates    = json_decode($rawExchangeRates, true);

        if (isset($exchangeRates['results'][$conversion]['val'])) {
            $this->exchangeRates[$currency] = $exchangeRates['results'][$conversion]['val'];
        }
    }

    public function refreshAll()
    {
        if (!$this->currencies) {
            $this->currencies = array_keys($this->getAllCurrencies());
        }

        foreach ($this->currencies as $currency) {
            $this->refresh($currency);
        }
    }

    public function getAllCurrencies(): array
    {
        $exchangeRatesUrl = $this->exchangeRatesUrl . '/api/v3/currencies';

        $rawCurrencies = file_get_contents($exchangeRatesUrl);
        $currencies    = json_decode($rawCurrencies, true);

        return $currencies['results'];
    }
}
