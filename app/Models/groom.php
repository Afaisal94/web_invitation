<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groom extends Model
{
    use HasFactory;

    protected $fillable = ['invitation_id', 'name', 'father_name', 'mother_name', 'photo'];
}
