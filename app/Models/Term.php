<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Term extends Model {

    use SoftDeletes;

    protected $table = 'terms';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug', 'year_quantity'];

    public function start_plans() {
        return $this->belongsToMany(Plan::class, 'plans', 'id', 'term_id');
    }


    public function stop_plans() {
        return $this->belongsToMany(Plan::class, 'plans', 'id', 'stop_reinvesting_term_id');
    }

}

//id
//name
//slug
//year_quantity
//created_at
//updated_at
//deleted_at