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
			$table->string('table', 255);
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
