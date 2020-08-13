<?php

namespace App\Http\Controllers;

use App\Http\Resources\SymbolCollection;
use App\Http\Resources\SymbolResource;
use App\Models\Symbol;
use Illuminate\Http\Request;

class SymbolController extends Controller
{
	public function __construct() 
	{
		$this->middleware('auth');
	}

	public function api(Request $request)
	{
		return SymbolResource::collection(
			Symbol::where('ticker', 'LIKE', $request->query('query').'%')
				->with('exchange')
				->limit(10)
				->get()
		);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return new SymbolCollection(Symbol::paginate());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Symbol  $symbol
	 * @return \Illuminate\Http\Response
	 */
	public function show(Symbol $symbol)
	{
		return $symbol->load('dividends', 'sector', 'sector.industry');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Symbol  $symbol
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Symbol $symbol)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Symbol  $symbol
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Symbol $symbol)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Symbol  $symbol
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Symbol $symbol)
	{
		//
	}
}
