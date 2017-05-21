<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model {

    use SoftDeletes;

    protected $table = 'currencies';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug', 'code'];

    public function plans() {
        return $this->belongsToMany(Plan::class, 'plans', 'currency_id', 'id');
    }

    public function reinvests() {
        return $this->belongsToMany(Reinvest::class, 'reinvests', 'currency_id', 'id');
    }

    public function withdrawals() {
        return $this->belongsToMany(Withdrawal::class, 'withdrawals', 'currency_id', 'id');
    }

}
