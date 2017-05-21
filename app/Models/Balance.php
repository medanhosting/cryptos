<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Balance extends Model {

    use SoftDeletes;

    protected $table = 'balances';
    protected $primaryKey = 'id';
    protected $fillable = ['plan_id', 'row_id', 'row_would_be_id', 'balance', 'balance_date', 'balance_hash_rate', 'withdrawal_id'];

    public function plan() {
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }

    public function row() {
        return $this->hasOne(Row::class, 'id', 'row_id');
    }

    public function row_would_be() {
        return $this->hasOne(Row::class, 'id', 'row_would_be_id');
    }

    public function withdrawal() {
        return $this->hasOne(Withdrawal::class, 'id', 'withdrawal_id');
    }

}

//id
//plan_id
//row_id
//row_would_be_id (after withdrawal)
//balance
//balance_date
//balance_hash_rate
//withdrawal_id
//created_at
//updated_at
//deleted_at