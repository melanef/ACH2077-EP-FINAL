<?php

namespace ACH2077;

require_once('init.php');

if (empty($_GET['resource'])) {
	header('Location: https://g2.each3.tk');
	exit;
}

function validateRequiredParameters($required_parameters) {
	$valid = true;
	$messages = [];
	foreach ($required_parameters as $parameter) {
		if (empty($_GET[$parameter])) {
			$valid = false;
			$messages[] = sprintf('O parâmetro \'%s\' é obrigatório', $parameter);
		}
	}

	return [$valid, $messages];
}

switch ($_GET['resource']) {
	case 'routes': 
		$routes = Models\Route::all();
		$response = [
			'success' => true,
			'data' => [],
		];
		foreach ($routes as $route) {
			$response['data'][] = [
				'id' => $route->id,
				'short_name' => $route->short_name,
				'name' => $route->name,
				'color' => $route->color,
				'text_color' => $route->text_color,
			];
		}
		break;
	case 'stops': 
		$required_parameters = [
			'minLat',
			'minLng',
			'maxLat',
			'maxLng',
		];
		
		list($valid, $messages) = validateRequiredParameters($required_parameters);

		$response = [
			'success' => $valid,
		];

		if (!$valid) {
			$response['errors'] = $messages;
			break;
		}

		$response['data'] = [];
		$stops = Models\Stop::where([
			['latitude', '>=', $_GET['minLat']],
			['latitude', '<=', $_GET['maxLat']],
			['longitude', '>=', $_GET['minLng']],
			['longitude', '<=', $_GET['maxLng']],
		])
			->get();
		foreach ($stops as $stop) {
			$response['data'][] = [
				'id' => $stop->id,
				'name' => $stop->name,
				'description' => $stop->description,
				'latitude' => $stop->latitude,
				'longitude' => $stop->longitude,
			];
		}
		break;
	case 'vehicles':
		$required_parameters = [
			'minLat',
			'minLng',
			'maxLat',
			'maxLng',
		];
		
		list($valid, $messages) = validateRequiredParameters($required_parameters);

		$response = [
			'success' => $valid,
		];

		if (!$valid) {
			$response['errors'] = $messages;
			break;
		}

		$routes = Models\Route::all();
		$client = new APIs\SPTrans\Client('AIzaSyDD7LKv4f0mMt0V1dLw3NObUyybTGg2pAw');
		
		$response['data'] = [];

		foreach ($routes as $route) {
			$route_vehicles = $client->getBusPositionByLineCode($route->short_name);

			var_dump($route_vehicles);
			exit;

			$response['data'] = array_merge($response['data'], $route_vehicles);
		}

		break;
	default:
		header('Location: https://g2.each3.tk');
		exit;
}

header('Content-Type: application/json');
print json_encode($response);