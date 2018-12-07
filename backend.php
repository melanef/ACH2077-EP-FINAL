<?php

include 'vendor/autoload.php';

if (empty($_GET['resource'])) {
	header('Location: https://g2.each3.tk');
	exit;
}

switch ($_GET['resource']) {
	case 'routes': 
		$response = ['foo': 'bar'];
		break;
	default:
		header('Location: https://g2.each3.tk');
		exit;
}

header('Content-Type: application/json');
print json_encode($response);