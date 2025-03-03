<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class exams_model extends Model
{
    public $table = "exams";
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'description'
    ];
}
