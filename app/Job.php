<?php

namespace App;

use Cerbero\QueryFilters\FiltersRecords;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Job extends Model
{
    use FiltersRecords;
    use SoftDeletes;
    use Searchable;



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
