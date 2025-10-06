<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'name',
        'id_number',
        'phone',
        'address',
        'consultation_date',
        'seen_by',
        'visit_type',
        'description'
    ];

    protected $casts = [
        'consultation_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
