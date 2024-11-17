<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    // Explicitly define the table name if it differs from the default
    protected $table = 'stock'; // Make sure this matches your table name

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
