<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'id', 'user_id','form_name'
    ];

    public function formFields() {
        return $this->hasMany(FormFields::class, 'form_id');
    }
}