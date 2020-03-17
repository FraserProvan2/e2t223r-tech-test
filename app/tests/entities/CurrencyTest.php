<?php

use PHPUnit\Framework\TestCase;

require('app/entities/Currency.php');
require('app/Utility.php');

class CurrencyTest extends TestCase
{
  /** @test */
  public function currency_code_is_set_as_expected()
  {
    $exchange_rates_arr = Utility::getXmlAsArray('./xml/ExchangeRates.xml');
    $currency = new Currency($exchange_rates_arr['currency'][0]);

    $this->assertEquals($currency->code, 'GBP');
  }

  /** @test */
  public function most_recent_rate_is_set_as_expected()
  {
    $exchange_rates_arr = Utility::getXmlAsArray('./xml/ExchangeRates.xml');
    $currency = new Currency($exchange_rates_arr['currency'][0]);

    $this->assertNotNull($currency->most_recent_rate);
    $this->assertCount(2, $currency->most_recent_rate['rate']);
    $this->assertEquals($currency->most_recent_rate['date'], '02/01/2016');
  }

  /** @test */
  public function returns_most_recent_rate_as_expected() 
  {
    $exchange_rates_arr = Utility::getXmlAsArray('./xml/ExchangeRates.xml');
    $currency = new Currency($exchange_rates_arr['currency'][0]);
    
    $most_recent = $currency->getMostRecentRate();
    $this->assertEquals($most_recent['date'], '02/01/2016');
  }
}