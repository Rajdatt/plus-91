<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortner extends Model
{
    protected $table="shortner";
    use HasFactory;
    protected $fillable = [
        'code', 'link'
    ];
}
