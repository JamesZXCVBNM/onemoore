<?php

namespace App\Services;

use GuzzleHttp\Client;

class FixerService
{
	public $client;

	public function __construct() 
	{
		$this->client = new Client([
			'base_uri' => 'http://data.fixer.io/api',
			'verify' => false,
		]);
	}

	public function handle($date)
	{
		$response = $this->client->get($date.'?symbols=USD,GBP,CAD&access_key='.env('FIXER_KEY'));
		return json_decode($response->getBody()->getContents(), true);
	}
}