<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HashRate extends Model {

    use SoftDeletes;

    protected $table = 'hash_rates';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug'];

    public function rows() {
        return $this->belongsToMany(Row::class, 'rows', 'id', 'hashrate_id');
    }

}

//id
//name
//slug
//created_at
//updated_at
//deleted_at