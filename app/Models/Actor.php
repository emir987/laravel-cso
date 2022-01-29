<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
	use HasFactory;

	public function movies()
	{
		//ukoliko ne nazovemo pravilno pivot tabelu potrbno je dodati i naziv pivot tabele kao i parent id i relacioni id
		// return $this->belongsToMany(Movie::class, "movie_actor", "actor_id", "movie_id");

		return $this->belongsToMany(Movie::class);
	}
}
