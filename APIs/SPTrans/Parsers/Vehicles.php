<?php

namespace ACH2077\APIs\SPTrans\Parsers;

class Vehicles
{
	protected $vehicles = [];

	public __construct(array $raw_data)
	{
		$routes = $raw_data['l'];
		foreach ($routes as $route) {
			foreach ($route['vs'] as $raw_vehicle) {
				$vehicles[] = [
					'route' => $route['c'],
					'latitude' => $raw_vehicle['py'],
					'longitude' => $raw_vehicle['px'],
					'from' => $route['lt0'],
					'to' => $route['lt1'],
				];
			}
		}
	}

	public getOutput()
	{
		return $this->vehicles;
	}
}