<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reinvest extends Model {

    use SoftDeletes;

    protected $table = 'reinvests';
    protected $primaryKey = 'id';
    protected $fillable = ['value', 'currency_id', 'reinvest_date'];

}

//id
//value
//currency_id
//reinvest_date
//created_at
//updated_at
//deleted_at