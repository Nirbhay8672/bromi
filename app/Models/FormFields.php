<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormFields extends Model
{
    protected $table = 'form_fields';
    protected $fillable = [
        'id', 'form_id','field_type_id'
    ];

    public function fieldDetails() {
        return $this->belongsTo(FormType::class, 'field_type_id'); // get the details of the fields
    }
}