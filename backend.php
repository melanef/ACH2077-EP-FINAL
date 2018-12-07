<?php

namespace ACH2077;

require_once('init.php');

if (empty($_GET['resource'])) {
	header('Location: https://g2.each3.tk');
	exit;
}

switch ($_GET['resource']) {
	case 'routes': 
		$routes = Models\Route::all();
		$response = [];
		foreach ($routes as $route) {
			$response[] = [
				'id' => $route->id,
				'short_name' => $route->short_name,
				'name' => $route->name,
				'color' => $route->color,
				'text_color' => $route->text_color,
			];
		}
		break;
	case 'stops': 
		$stops = Models\Stop::all();
		$response = [];
		foreach ($stops as $stop) {
			$response[] = [
				'id' => $stop->id,
				'name' => $stop->name,
				'description' => $stop->description,
				'latitude' => $stop->latitude,
				'longitude' => $stop->longitude,
			];
		}
		break;
	default:
		header('Location: https://g2.each3.tk');
		exit;
}

header('Content-Type: application/json');
print json_encode($response);