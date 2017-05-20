<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HashRate extends Model {

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