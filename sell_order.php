<?php

// sell_order.php <id>
require_once "bootstrap.php";
$id = $argv[1];

$order = $entityManager->find('Order', $id);

if ($order === null) {
    echo "Product $id does not exist.\n";
    exit(1);
}
if (!$order->getSaleStatus()){
    echo "Order " . $order->getOrderNumber() ." sold successful" ."\n";}
else {echo "Order " . $order->getOrderNumber() ." already sold" ."\n";}



$order->sellOrder();

$entityManager->flush();

