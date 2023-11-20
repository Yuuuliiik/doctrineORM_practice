<?php

// assign_manager.php <id> <managerName>
require_once "bootstrap.php";
$id = $argv[1];
$managerName = $argv[2];

$order = $entityManager->find('Order', $id);

if ($order === null) {
    echo "Product $id does not exist.\n";
    exit(1);
}

$order->assignManager($managerName);

$entityManager->flush();

echo "Manager " . $order->getManagerName() ." assignment successful" ."\n";

