<?php
// create_product.php <orderNumber> <costumerName>
require_once "bootstrap.php";

$newOrderNumber = $argv[1];
$newCustomerName = $argv[2];

$order = new Order();
$order->setOrderNumber($newOrderNumber);
$order->setCustomerName ($newCustomerName);


$entityManager->persist($order);
$entityManager->flush();

echo "Created Product with ID " . $order->getId() . "\n";
