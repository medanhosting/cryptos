<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReinvestPeriod extends Model {

    protected $table = 'reinvest_periods';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug'];

}

//id
//name
//slug
//created_at
//updated_at
//deleted_at