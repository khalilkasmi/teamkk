<?php

namespace App;

use Cerbero\QueryFilters\FiltersRecords;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use FiltersRecords;
    use SoftDeletes;


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
