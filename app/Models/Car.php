<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'marca',
        'modelo',
        'anio',
        'color',
        'precio',
        'kilometraje',
        'imagen',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
