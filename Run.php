<?php 

require('app/Utility.php');

// xml files as JSON
$orders_arr = Utility::getXmlAsArray('./xml/Orders.xml');
$exchange_rates_arr = Utility::getXmlAsArray('./xml/ExchangeRates.xml');

