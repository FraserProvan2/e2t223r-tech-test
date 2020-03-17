<?php

use PHPUnit\Framework\TestCase;

class ExchangeRateTest extends TestCase
{
  /** @test */
  public function correctly_exchanges_rate() 
  {
    // setup
    $exchange_rates_arr = Utility::getXmlAsArray('./xml/ExchangeRates.xml');
    $gbp = new Currency($exchange_rates_arr['currency'][0]);
    $test_case = Utility::exchangeRate(10.88, 'GBP', 'EUR', $gbp);

    // test
    $this->assertEquals($test_case['total'], 11.86);
    $this->assertEquals($test_case['code'], 'EUR');
  }

    /** @test */
    public function catches_when_incorrect_convert_from_and_rates_value() 
    {
      $this->expectExceptionMessage('Incorrect rate for currency code in param #4');

      // setup
      $exchange_rates_arr = Utility::getXmlAsArray('./xml/ExchangeRates.xml');
      $gbp = new Currency($exchange_rates_arr['currency'][0]);
      Utility::exchangeRate(10.88, 'USD', 'EUR', $gbp);
    }
}