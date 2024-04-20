<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class BromiEnquiry extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['next_follow_up_date', 'next_follow_up_time'];

    public function getNextFollowUpDateAttribute()
    {
        if (!empty($this->followup_date)) {
            # code...
            return Carbon::parse($this->followup_date)->format('Y-m-d');
        }
        return null;
    }
    public function getNextFollowUpTimeAttribute() {
        if (!empty($this->followup_date)) {
            # code...
            return Carbon::parse($this->followup_date)->format('H:i');
        }
        return null;
    }
}
