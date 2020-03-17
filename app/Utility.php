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

  static function outputNewTotal($output_file_name, $total) {
    $file = fopen(('./output/' . $output_file_name . '.xml'), 'w'); 

    $xml = new SimpleXMLElement('<exchanged/>');

    // adding amount
    $new_total = $xml->addChild('total');
    $new_total->addAttribute('amount', $total['total']);
    $new_total->addAttribute('currency_code', $total['code']);

    // write to file
    Header('Content-type: text/xml');
    fwrite($file, $xml->saveXML());
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
      'total' => round(($total * $exchange_rate), 2),
      'code' => $to_convert_to
    ];
  }
}