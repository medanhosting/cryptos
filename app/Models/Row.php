<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Row extends Model {

    use SoftDeletes;

    protected $table = 'rows';
    protected $primaryKey = 'id';
    protected $fillable = ['plan_id', 'hashrate_id', 'quantity', 'date_invested', 'month_invested', 'month_invested',
        'year_invested', 'reinvest_id', 'expected_difficulty_id', 'actual_difficulty_id'];

    public function plan() {
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }

    public function hash_rate() {
        return $this->hasOne(HashRate::class, 'id', 'hashrate_id');
    }

    public function reinvest() {
        return $this->hasOne(Reinvest::class, 'id', 'reinvest_id');
    }

    public function expected_difficulty() {
        return $this->hasOne(Difficulty::class, 'id', 'expected_difficulty_id');
    }

    public function actual_difficulty() {
        return $this->hasOne(Difficulty::class, 'id', 'actual_difficulty_id');
    }

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
//created_at
//updated_at
//deleted_at