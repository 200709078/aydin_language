<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class exams_model extends Model
{
    public $table = "exams";
    use HasFactory, SoftDeletes, Sluggable;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'finished_at'
    ];
    protected $dates = ['finished_at'];
    protected $appends=['details'];

    
    public function getDetailsAttribute(){
        if($this->all_results()->count() > 0){
            return [
                'average'=>round($this->all_results()->avg('point'),2),
                'join_count'=>$this->all_results()->count()
            ];
        }
        return null;
    }
    public function my_result()
    {
        return $this->hasOne(results_model::class, 'exam_id')->where('user_id', auth()->user()->id);
    }

    
    public function all_results()
    {
        return $this->hasMany(results_model::class, 'exam_id');
    }
    public function getFinishedAtAttribute($date)
    {
        return $date ? Carbon::parse($date) : null;
    }
    public function questions()
    {
        return $this->hasMany(questions_model::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
