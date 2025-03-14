<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class questions_model extends Model
{
    public $table = "questions";
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'question',
        'image',
        'select1',
        'select2',
        'select3',
        'select4',
        'select5',
        'correct_answer'
    ];

    public function my_answer()
    {
        return $this->hasOne(answers_model::class, 'question_id')->where('user_id',auth()->user()->id);
    }
}
