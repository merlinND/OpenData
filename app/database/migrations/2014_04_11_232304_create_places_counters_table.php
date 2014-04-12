<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesCountersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('places_counters', function(Blueprint $table)
		{
			$table->engine ='InnoDB';
			$table->increments('id')
					->unsigned();
					// ->onDelete('cascade');
			$table->integer('display');
			$table->integer('go');
			$table->integer('skip');
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
		Schema::drop('places_counters');
	}

}
