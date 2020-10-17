<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oex_result extends Model
{
    protected $table = 'oex_results';
    protected $primaryKey = 'id';
    protected $fillable = ['exam_id','user_id','yes_ans','no_ans','question_json'];
}
