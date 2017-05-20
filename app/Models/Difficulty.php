<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model {

    protected $table = 'difficulties';
    protected $primaryKey = 'id';
    protected $fillable = ['difficulty_date', 'difficulty', 'next_difficulty', 'is_current_difficulty'];

}

//id
//difficulty_date
//difficulty
//next_difficulty
//is_current_difficulty
//created_at
//updated_at
//deleted_at