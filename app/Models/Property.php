<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';

    protected $fillable = ['title', 'name', 'description', 'rental_price', 'sale_price'];

    public $timestamps = false;
}
