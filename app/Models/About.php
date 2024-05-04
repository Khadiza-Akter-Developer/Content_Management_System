<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table='blogs';
    protected $primary_key ='id';
    protected $fillable=[
        'titel',
        'image',
        'description', 
    ];
}
