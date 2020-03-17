<?php 

require('app/Utility.php');
require('app/entities/Order.php');

// xml files as JSON
$orders_arr = Utility::getXmlAsArray('./xml/Orders.xml');
$exchange_rates_arr = Utility::getXmlAsArray('./xml/ExchangeRates.xml');

// getting totals of orders
$order_1 = new Order($orders_arr['order'][0]);
$order_1->getOrderTotal();
$order_2 = new Order($orders_arr['order'][1]);
$order_2->getOrderTotal();

echo $order_1->getOrderTotal();