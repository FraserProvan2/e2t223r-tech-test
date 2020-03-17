<?php

class Order {
  
  public $total;

  public function __construct($order)
  {
    $this->total = $order['total'];
  }

  /**
   * Gets total of order
   * 
   * @return float price
   */
  public function getOrderTotal() {
    return $this->total;
  }
}