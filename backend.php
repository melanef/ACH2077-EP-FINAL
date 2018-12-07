<?php

namespace ACH2077;

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'vendor/autoload.php';

if (empty($_GET['resource'])) {
	header('Location: https://g2.each3.tk');
	exit;
}

switch ($_GET['resource']) {
	case 'routes': 
		$routes = Models\Route::all();
		$response = [];
		foreach ($routes as $route) {
			print $route->id;
			/*
			$response[] = [
				'id' => $route->id,
				'short_name' => $route->short_name,
				'name' => $route->name,
				'color' => $route->color,
				'text_color' => $route->text_color,
			];
			*/
		}
		break;
	default:
		header('Location: https://g2.each3.tk');
		exit;
}

/*
header('Content-Type: application/json');
print json_encode($response);
*/