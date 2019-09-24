<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->hasMany(ImagesPortfolio::class);
    }
}
