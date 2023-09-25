<?php

namespace App\Models;

use App\Scopes\VendorScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;

class State extends Model
{
	use HasFactory;
use SoftDeletes;
	use LogsActivity;

	protected static $recordEvents = ['created','updated','deleted'];
	protected static $logAttributes = ['name'];


	// protected static function boot()
	// {
	// 	parent::boot();
	// 	static::addGlobalScope(new VendorScope);
	// }


	protected $table = 'state';

	protected $fillable = [
		'user_id',
		'name',
	];


}
