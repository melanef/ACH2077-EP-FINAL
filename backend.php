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
		$valid = true;
		$messages = [];
		foreach ($required_parameters as $parameter) {
			if (empty($_GET[$parameter])) {
				$valid = false;
				$messages[] = sprintf('O parâmetro \'%s\' é obrigatório', $parameter);
			}
		}

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
	default:
		header('Location: https://g2.each3.tk');
		exit;
}

header('Content-Type: application/json');
print json_encode($response);