<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Withdrawal extends Model {

    use SoftDeletes;

    protected $table = 'withdrawals';
    protected $primaryKey = 'id';
    protected $fillable = ['value', 'currency_id', 'plan_id', 'withdrawal_date'];

    public function plan() {
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }

    public function currency() {
        return $this->hasOne(Currency::class, 'id', 'currency_id');
    }

}

//id
//value
//currency_id
//plan_id
//withdrawal_date
//created_at
//updated_at
//deleted_at