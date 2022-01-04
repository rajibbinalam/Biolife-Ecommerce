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

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function brand(){
        return $this->hasOne(Brand::class,'id','brand_id');
    }
    public function added(){
        return $this->hasOne(Admin::class,'id','add_by');
    }
}
