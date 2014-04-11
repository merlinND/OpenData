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
		Schema::create('Places', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 255);
			$table->string('description', 255);

			// First look : OSRM gives "mapped_coordinate" as a pair of float
			$table->float('latitude');
			$table->float('longitude');

			// The Code of the location (Example : 76100)
			$table->integer('zipcode');
			$table->string('city', 255);
			$table->integer('idType');
			$table->integer('idTime');
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
		Schema::drop('Places');
	}

}
