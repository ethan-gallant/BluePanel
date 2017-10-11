<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('user_kiosks', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('user_kiosks', function(Blueprint $table) {
			$table->foreign('kiosk_id')->references('id')->on('kiosks')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('kiosk_students', function(Blueprint $table) {
			$table->foreign('student_id')->references('id')->on('students')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('kiosk_students', function(Blueprint $table) {
			$table->foreign('kiosk_id')->references('id')->on('kiosks')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('kiosk_logs', function(Blueprint $table) {
			$table->foreign('kiosk_id')->references('id')->on('kiosks')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('kiosk_logs', function(Blueprint $table) {
			$table->foreign('student_id')->references('id')->on('students')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('user_kiosks', function(Blueprint $table) {
			$table->dropForeign('user_kiosks_user_id_foreign');
		});
		Schema::table('user_kiosks', function(Blueprint $table) {
			$table->dropForeign('user_kiosks_kiosk_id_foreign');
		});
		Schema::table('kiosk_students', function(Blueprint $table) {
			$table->dropForeign('kiosk_students_student_id_foreign');
		});
		Schema::table('kiosk_students', function(Blueprint $table) {
			$table->dropForeign('kiosk_students_kiosk_id_foreign');
		});
		Schema::table('kiosk_logs', function(Blueprint $table) {
			$table->dropForeign('kiosk_logs_kiosk_id_foreign');
		});
		Schema::table('kiosk_logs', function(Blueprint $table) {
			$table->dropForeign('kiosk_logs_student_id_foreign');
		});
	}
}