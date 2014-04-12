<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function(Blueprint $table)
		{
			$table->engine ='InnoDB';
			$table->increments('id');
			$table->text('url');
			$table->integer('idPlace')
				->unsigned()
				->references('id')->on('places');
					// ->onDelete('cascade');
			$table->integer('width');
			$table->integer('height');
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
		Schema::drop('photos');
	}

}
