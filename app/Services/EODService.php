<?php

namespace App\Services;

use GuzzleHttp\Client;

class EODService
{
	public $uri;
	public $client;

	public function __construct($uri) 
	{
		$this->uri = $uri;
		$this->client = new Client([
			'base_uri' => 'https://eodhistoricaldata.com/api/',
			'verify' => false,
		]);
	}

	public function handle()
	{
		$response = $this->client->get($this->uri.'&api_token='.env('EOD_KEY'));
		return json_decode($response->getBody()->getContents(), true);
	}
}