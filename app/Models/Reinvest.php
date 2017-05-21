<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reinvest extends Model {

    use SoftDeletes;

    protected $table = 'reinvests';
    protected $primaryKey = 'id';
    protected $fillable = ['value', 'plan_id', 'currency_id', 'reinvest_date'];

    public function plan() {
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }

    public function currency() {
        return $this->hasOne(Currency::class, 'id', 'currency_id');
    }

    public function row() {
        return $this->belongsTo(Row::class, 'id', 'reinvest_id');
    }

}

//id
//value
//plan_id
//currency_id
//reinvest_date
//created_at
//updated_at
//deleted_at