<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKiosksTable extends Migration {

	public function up()
	{
		Schema::create('kiosks', function(Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->timestamps();
			$table->string('name');
			$table->integer('room');
			$table->string('logo');
			$table->string('background');
		});
	}

	public function down()
	{
		Schema::drop('kiosks');
	}
}