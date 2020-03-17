<?php

use PHPUnit\Framework\TestCase;

require('app/entities/Order.php');

class OrderTest extends TestCase
{
  /** @test */
  public function gets_total_as_expected() 
  {
    $order = new Order(['total' => '12.34']);
    $this->assertEquals($order->getOrderTotal(), '12.34');
  }
}