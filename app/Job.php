<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function feedBack(){
        return $this->hasMany(Feedback::class);
    }

    public function subCat(){
        return $this->belongsTo(SubCategory::class);
    }
}
