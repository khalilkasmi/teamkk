<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function jobs(){
        return $this->hasMany(Job::class,'sub_cat_id','id');
    }
}
