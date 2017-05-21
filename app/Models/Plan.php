<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model {

    use SoftDeletes;

    protected $table = 'plans';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'currency_id', 'plan_date', 'starting_row', 'reinvest', 'reinvest_period_id', 'term_id', 'stop_reinvesting_term_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function currency() {
        return $this->hasOne(Currency::class, 'id', 'currency_id');
    }

    public function reinvests() {
        return $this->hasMany(Reinvest::class, 'plan_id', 'id');
    }

    public function reinvestment_period() {
        return $this->hasOne(Currency::class, 'id', 'reinvest_period_id');
    }

    public function term() {
        return $this->hasOne(Term::class, 'id', 'term_id');
    }

    public function stop_term() {
        return $this->hasOne(Term::class, 'id', 'stop_reinvesting_term_id');
    }

    public function rows() {
        return $this->hasMany(Row::class, 'plan_id', 'id');
    }

    public function withdrawals() {
        return $this->hasMany(Withdrawal::class, 'plan_id', 'id');
    }

}

//id
//user_id
//currency_id
//plan_date
//starting_row
//reinvest
//reinvest_period_id
//term_id
//stop_reinvesting_term_id
//created_at
//updated_at
//deleted_at