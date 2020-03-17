<?php 

require('app/Utility.php');
require('app/entities/Order.php');
require('app/entities/Currency.php');

// xml files as JSON
$orders_arr = Utility::getXmlAsArray('./xml/Orders.xml');
$exchange_rates_arr = Utility::getXmlAsArray('./xml/ExchangeRates.xml');

// represent orders using Order class
$order_1 = new Order($orders_arr['order'][0]);
$order_2 = new Order($orders_arr['order'][1]);

// get totals
$order_1_total = $order_1->getOrderTotal();
$order_2_total = $order_2->getOrderTotal();

// represent currencies using Currency class
$gbp = new Currency($exchange_rates_arr['currency'][0]);
$eur = new Currency($exchange_rates_arr['currency'][1]);

// calc exchange rates for orders
$q1 = Utility::exchangeRate($order_1_total, 'GBP', 'EUR', $gbp);
$q2 = Utility::exchangeRate($order_2_total, 'EUR', 'GBP', $eur);

// write output as xml
Utility::outputNewTotal('case1', $q1);
Utility::outputNewTotal('case2', $q2);