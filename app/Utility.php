<?php

class Utility {

  /**
   * Gets xml file, returns as array
   * 
   * @param string file path
   * @return array xml content
   */
  static function getXmlAsArray($file_path)
  {
    $file = file_get_contents('./' . $file_path);
    $xml = simplexml_load_string($file);
    return json_decode(json_encode($xml),TRUE);
  }

  /**
   * exchanges the rate of a currency to a new currency
   * 
   * @param float price
   * @param string currency code to exhange from
   * @param string currency code to exhange to
   * @param string array of code and rate
   * @return array total and new currency code
   */
  static function exchangeRate($total, $to_convert, $to_convert_to, $rates) {
    if ($rates->code !== $to_convert) {
      throw new Exception('Incorrect rate for currency code in param #4');
    }

    $exchange_rate = null;
    foreach($rates->most_recent_rate['rate'] as $rate) {
      $rate = $rate['@attributes'];

      if ($rate['code'] === $to_convert_to) {
        $exchange_rate = $rate['value'];
      }
    }

    return [
      'total' => ($total * $exchange_rate),
      'code' => $to_convert_to
    ];
  }
}