<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'stock';

    protected $fillable = [
        'sku',
        'name',
        'price',
        'size',
        'weight',
        'height',
        'width',
        'length',
    ];
}
