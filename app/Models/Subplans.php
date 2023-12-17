<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subplans extends Model
{
    use HasFactory;
<<<<<<< HEAD
	use SoftDeletes;

	protected $fillable = [
		'name',
		'user_limit',
=======
use SoftDeletes;

	protected $fillable = [
		'name',
>>>>>>> 9e5dc74 (Initial server setup)
		'details',
		'price',
	];
}
