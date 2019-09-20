<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subCats(){
        return $this->hasMany(SubCategory::class);
    }

    public function jobs(){
        return $this->subCats()->jobs();
    }

}
