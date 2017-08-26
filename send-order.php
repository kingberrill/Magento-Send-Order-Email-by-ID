<?php
// gain access to magento
error_reporting( E_ALL );
require_once "app/Mage.php";
Mage::app('admin');


// set order id
$orderId = '10000000';
$customEmail = 'your-email';

try {
	// send order email
	$order = Mage::getModel('sales/order')->loadByIncrementId($orderId);
	
	// check if order id exists
	if ($order->getId()) {
		$order->setCustomerEmail($customEmail);
		$order->sendNewOrderEmail();
		echo "Order #$orderId successfully sent to $customEmail";
		//print_r($order->debug());
	} else {
		// if no order id was found
		echo "Order #$orderId not found\n";
	}

} catch (Exception $e) {
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
