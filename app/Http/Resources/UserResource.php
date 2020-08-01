<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
			'is_shared' => $this->is_shared,
			'currency' => $this->currency,
			'portfolio' => PositionResource::collection($this->whenLoaded('portfolio')),
			$this->mergeWhen($this->subscriptions, [
				'subscription' => new SubscriptionResource($this->subscriptions->first()),
			]),
		];
	}
}
