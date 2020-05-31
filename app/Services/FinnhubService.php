<?php

namespace App\Services;

use GuzzleHttp\Client;

class FinnhubService
{
	public $uri;
	public $client;

	public function __construct($uri) 
	{
		$this->uri = $uri;
		$this->client = new Client([
			'base_uri' => 'https://finnhub.io/api/v1/',
			'verify' => false,
		]);
	}

	public function handle()
	{
		$response = $this->client->get($this->uri.'&token='.env('FINNHUB_KEY'));
		return json_decode($response->getBody()->getContents(), true);
	}
}