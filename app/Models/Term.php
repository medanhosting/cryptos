<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Term extends Model {

    protected $table = 'terms';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug', 'year_quantity'];

}

//id
//name
//slug
//year_quantity
//created_at
//updated_at
//deleted_at