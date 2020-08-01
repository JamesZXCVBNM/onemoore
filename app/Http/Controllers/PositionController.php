<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionStoreRequest;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PositionController extends Controller
{
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(PositionStoreRequest $request)
	{
		$request->merge(['user_id' => Auth::id()]);
		return Position::create($request->all());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Position  $Position
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Position $position)
	{
		$position->update($request->all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Position  $Position
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Position $position)
	{
		$position->delete();
	}
}
