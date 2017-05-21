<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReinvestPeriod extends Model {

    use SoftDeletes;

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