<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model {

    protected $table = 'balances';
    protected $primaryKey = 'id';
    protected $fillable = ['plan_id', 'row_id', 'row_would_be_id', 'balance', 'balance_date', 'withdrawal_id'];

}

//id
//plan_id
//row_id
//row_would_be_id (after withdrawal)
//balance
//balance_date
//withdrawal_id
//created_at
//updated_at
//deleted_at