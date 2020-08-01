<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
	public function index()
	{
		$intent = auth()->user()->createSetupIntent();
		return view('plans.index', compact('intent'));
	}

	public function show(Plan $plan)
	{
		return $plan;
		// $intent = auth()->user()->createSetupIntent();
		// return view('plans.show', compact('plan', 'intent'));
	}
}
