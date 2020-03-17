<?php

class Utility {

  /**
   * Gets xml file, returns as array
   * 
   * @param string file path
   * @return array xml content
   */
  static function getXmlAsArray(string $file_path): array
  {
    $file = file_get_contents('./' . $file_path);
    $xml = simplexml_load_string($file);
    return json_decode(json_encode($xml),TRUE);
  }
}