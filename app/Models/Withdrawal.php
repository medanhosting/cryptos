<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model {

    protected $table = 'withdrawals';
    protected $primaryKey = 'id';
    protected $fillable = ['value', 'currency_id', 'plan_id', 'withdrawal_date'];

}

//id
//value
//currency_id
//plan_id
//withdrawal_date
//created_at
//updated_at
//deleted_at