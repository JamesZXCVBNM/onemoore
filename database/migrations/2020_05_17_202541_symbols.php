<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Symbols extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('symbols', function (Blueprint $table) {
			$table->id();
			$table->foreignId('sector_id');
			$table->foreignId('exchange_id');
			$table->string('ticker');
			$table->string('name');
			$table->string('logo');
			$table->timestamps();

			$table->index('sector_id');
			$table->index('exchange_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('symbols');
	}
}
