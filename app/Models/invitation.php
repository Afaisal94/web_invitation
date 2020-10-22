<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invitation extends Model
{
    use HasFactory;

    protected $fillable = ['wedding_date', 'wedding_time', 'location', 'gmap_code', 'slug'];
}
