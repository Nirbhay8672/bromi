<?php

namespace App\Models;

use App\Scopes\VendorScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;

class City extends Model
{
	use HasFactory;
use SoftDeletes;
	use LogsActivity;

	protected static $recordEvents = ['created','updated','deleted'];
	protected static $logAttributes = ['name'];

	protected $table = 'city';

	protected $fillable = [
		'user_id',
		'name',
		'state_id',
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new VendorScope);
	}

	public function State()
	{
		return $this->belongsTo(State::class, 'state_id', 'id')->withTrashed();
	}
}
