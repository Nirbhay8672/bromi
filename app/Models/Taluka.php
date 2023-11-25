<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taluka extends Model
{
	use HasFactory;
use SoftDeletes;

	protected $table = 'taluka';

	protected $fillable = [
		'district_id',
		'name',
	];
}
