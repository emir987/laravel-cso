<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieActorTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('movie_actor', function (Blueprint $table) {
			$table->id();
			//ukoliko se movie_id nazove drugacije potrebno je u contrained navesti ime relacione tabele
			$table->foreignId('movie_id')->constrained()->onDelete('cascade');
			$table->foreignId('actor_id')->constrained()->onDelete('cascade');

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
		Schema::dropIfExists('movie_actor');
	}
}
