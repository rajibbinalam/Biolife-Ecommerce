<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;



    public function blogcategory(){
        return $this->hasOne(BlogCategory::class,'id','blog_categories_id');
    }
}
