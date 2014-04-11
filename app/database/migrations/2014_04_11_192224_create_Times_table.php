<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Times', function(Blueprint $table)
		{
			$table->increments('id');
			// Minimum Time in seconds
			$table->integer('minimum');
			// Maximum Time in seconds
			$table->integer('maximum');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Times');
	}

}
