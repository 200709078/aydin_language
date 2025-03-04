<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use illuminate\Database\Eloquent\Relations\BelongsTo;

class exams_model extends Model
{
    public $table = "exams";
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'finished_at'
    ];
    public function questions()
    {
        return $this->hasMany(questions_model::class);
    }
}
