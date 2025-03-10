<?php
namespace App\Http\Controllers;
use App\Models\exams_model;
class main_cont_user extends Controller
{
    public function dashboard()
    {
        $exams = exams_model::where('status', 'publish')->withCount('questions')->paginate(5);
        return view("dashboard", compact('exams'));
    }
    public function exam_detail($slug)
    {
        $exam = exams_model::whereSlug($slug)->withCount('questions')->first() ?? abort(404, "EXAM NOT FOUND.");
        return view("exam_detail", compact('exam'));
    }
    public function exam_join($slug){
        $exam = exams_model::whereSlug($slug)->with('questions')->first() ?? abort(404, 'EXAM NOT FOUND.');
        return view('exam_join',compact('exam'));
    }
}
