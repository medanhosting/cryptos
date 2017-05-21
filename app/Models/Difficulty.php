<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Difficulty extends Model {

    use SoftDeletes;

    protected $table = 'difficulties';
    protected $primaryKey = 'id';
    protected $fillable = ['difficulty_date', 'difficulty', 'next_difficulty', 'is_current_difficulty'];

    public function expected_rows() {
        return $this->belongsToMany(Row::class, 'rows', 'id', 'expected_difficulty_id');
    }

    public function actual_rows() {
        return $this->belongsToMany(Row::class, 'rows', 'id', 'actual_difficulty_id');
    }


}

//id
//difficulty_date
//difficulty
//next_difficulty
//is_current_difficulty
//created_at
//updated_at
//deleted_at