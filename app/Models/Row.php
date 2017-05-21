<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Row extends Model {

    use SoftDeletes;

    protected $table = 'rows';
    protected $primaryKey = 'id';
    protected $fillable = ['plan_id', 'hashrate_id', 'quantity', 'date_invested', 'month_invested', 'month_invested',
        'year_invested', 'reinvest_id', 'expected_difficulty_id', 'actual_difficulty_id', 'pulled_out', 'would_be_id'];

}

//id
//plan_id
//hashrate_id
//quantity
//date_invested
//month_invested
//year_invested
//reinvest_id
//expected_difficulty_id
//actual_difficulty_id
//pulled_out
//would_be_id (links to pulled out)
//created_at
//updated_at
//deleted_at