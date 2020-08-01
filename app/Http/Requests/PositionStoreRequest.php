<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PositionStoreRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		if ($this->user()->subscriptions()->active()->count() > 0) {
			return true;
		}
		else {
			return $this->user()->positions()->count() >= 3 
				? false 
				: true;
		}
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'symbol_id' => 'required',
			'quantity' => 'required|min:0.0001',
			'price' => 'required|min:0.01',
		];
	}
}
