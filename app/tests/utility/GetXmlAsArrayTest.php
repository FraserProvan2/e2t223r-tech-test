<?php

use PHPUnit\Framework\TestCase;

class GetXmlAsArrayTest extends TestCase
{
  /** @test */
  public function returns_xml_as_array_as_expected() 
  {
    $arr = Utility::getXmlAsArray('./xml/Orders.xml');

    $this->assertArrayHasKey('order', $arr); // confirming it is array
  }
}