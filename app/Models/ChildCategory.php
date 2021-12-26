<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    use HasFactory;

    public function subcategory(){
        return $this->hasOne(SubCategory::class,'id','sub_category_id');
    }
}
