<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model {

    protected $table = 'currencies';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug', 'code'];

}
