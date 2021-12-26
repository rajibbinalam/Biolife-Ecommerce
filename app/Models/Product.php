<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
            'name',
            'sku',
            'new_price',
            'old_price',
            'quantity',
            'size',
            'add_by',
            'image',
            'details',
            'category_id',
            'sub_category_id',
            'child_category_id',
    ];
}
