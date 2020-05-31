<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserSymbols extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_symbols', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id');
			$table->foreignId('symbol_id');
			$table->unsignedDecimal('quantity', 8, 2);
			$table->unsignedDecimal('price', 8, 2);
			$table->timestamps();

			$table->index('user_id');
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
		Schema::drop('user_symbols');
	}
}
