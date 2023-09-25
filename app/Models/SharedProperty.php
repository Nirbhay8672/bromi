<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SharedProperty extends Model
{
	use HasFactory;
	use SoftDeletes;
	protected $table = 'shared_property';

	protected $fillable = [
		'user_id',
		'partner_id',
		'property_id',
		'accepted',
	];

	public function Property()
	{
		return $this->belongsTo(Properties::class, 'property_id', 'id')->with('Projects')->withTrashed();
	}

	public function User()
	{
		return $this->belongsTo(User::class, 'user_id', 'id')->withTrashed();
	}
}
