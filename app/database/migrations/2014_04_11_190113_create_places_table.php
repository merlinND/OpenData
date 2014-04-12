<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('places', function(Blueprint $table)
		{
			$table->engine ='InnoDB';
			$table->increments('id');
			$table->string('name', 255);
			$table->string('description', 255);

			// First look : OSRM gives "mapped_coordinate" as a pair of float
			$table->decimal('latitude', 15, 15);
			$table->decimal('longitude', 15, 15);

			// The Code of the location (Example : 76100)
			$table->integer('zipcode');
			$table->string('city', 255);

			$table->integer('idType')
					->unsigned()
					->references('id')->on('types');
					// ->onDelete('cascade');

			$table->integer('idTime')
					->unsigned()->nullable()
					->references('id')->on('times');
					// ->onDelete('cascade');

			// TODO Rajouter View
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
		Schema::drop('places');
	}

}
