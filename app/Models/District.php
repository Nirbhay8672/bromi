<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'district';

	protected $guarded = [];

	public function talukas()
	{ 
		return $this->hasMany(SuperTaluka::class);
	}
}
