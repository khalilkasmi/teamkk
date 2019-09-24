<?php

namespace App\QueryFilters;

use Cerbero\QueryFilters\QueryFilters;

/**
 * Filter records based on query parameters.
 *
 */
class JobsFilters extends QueryFilters
{
    /**
     * Filter records based on the query parameter "job_city"
     *
     * @param mixed $city
     * @return void
     */
    public function jobCity($city)
    {
        // $this->query
        $this->query->where('ville',$city);
    }

    /**
     * Filter records based on the query parameter "job_subcat"
     *
     * @param mixed $subcat
     * @return void
     */
    public function jobSubcat($subcat)
    {
        // $this->query
        $this->query->where('sub_cat_id',$subcat);

    }
}
