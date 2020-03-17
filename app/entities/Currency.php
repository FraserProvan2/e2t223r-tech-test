<?php

class Currency {

  public $code;
  public $most_recent_rate;
  
  public function __construct($currency)
  {
    $this->code = $currency['code'];
    $this->most_recent_rate = $this->setMostRecentRate($currency['rateHistory']);
  }

  /**
   * Sets the most recent rate
   * 
   * @param array historic rates
   * @return array most recent rate and date
   */
  private function setMostRecentRate($rate_history) 
  {
    $most_recent = [
      'date' => null,
      'rate' => null
    ];

    foreach($rate_history['rates'] as $rate) {
      $date = strtotime($rate['@attributes']['date']);

      if (!isset($most_recent) || $date > $most_recent['date']) {
        $most_recent = [
          'date' => $rate['@attributes']['date'],
          'rate' => $rate['rate']
        ];
      }
    }

    return $most_recent;
  }

  /**
   * gets the most recent rate
   * 
   * @return array rate and country code
   */
  public function getMostRecentRate() {
    return $this->most_recent_rate;
  }
}
