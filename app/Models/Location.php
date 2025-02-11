<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'latitude',
        'longitude',
        'marker_color',
    ];
    protected $guarded = ['id'];
}
