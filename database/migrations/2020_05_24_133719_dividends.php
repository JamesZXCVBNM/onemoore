<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dividends extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dividends', function (Blueprint $table) {
			$table->id();
			$table->foreignId('symbol_id');
			$table->date('ex_date');
			$table->date('pay_date');
			$table->date('record_date');
			$table->date('declaration_date');
			$table->timestamps();

			$table->index('symbol_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dividends');
	}
}
