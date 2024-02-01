<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNotifications extends Model
{
    use HasFactory;

	protected $fillable = [
		'user_id',
		'notification',
		'seen',
        'notification_type',
        'property_id',
        'enquiry_id',
        'by_user',
        'new_user_id',
        'schedule_date',
        
	];
}
