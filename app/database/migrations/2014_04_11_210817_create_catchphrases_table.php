<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatchphrasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('catchphrases', function(Blueprint $table)
		{
			$table->increments('id');
			// References a translation key
			$table->string('key', 255);
			$table->enum('table', array('types', 'places'));
			// The id of the object in <table>
			$table->integer('idTable');
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
		Schema::drop('catchphrases');
	}

}
