<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
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
			'name' => $this->name,
			'status' => $this->stripe_status,
			'ends_at' => $this->ends_at->format('Y-m-d H:i:s'),
			'created_at' => $this->created_at->format('Y-m-d H:i:s'),
		];
	}
}
