<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HashRate extends Model {

    use SoftDeletes;

    protected $table = 'hash_rates';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug'];

}

//id
//name
//slug
//created_at
//updated_at
//deleted_at