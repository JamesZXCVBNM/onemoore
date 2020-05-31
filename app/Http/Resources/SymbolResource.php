<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SymbolResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request)
	{
		return [
			'id' => $this->id,
			'sector_id' => $this->sector_id,
			'ticker' => $this->ticker,
			'name' => $this->name,
			'logo' => $this->logo,
			'sector' => new SectorResource($this->sector),
			'dividends' => DividendResource::collection($this->whenLoaded('dividends')),
		];
	}
}
