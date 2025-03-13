<?php
namespace App\Http\Controllers;
use App\Models\answers_model;
use App\Models\exams_model;
use App\Models\results_model;
use Illuminate\Http\Request;
class main_cont_user extends Controller
{
    public function dashboard()
    {
        $exams = exams_model::where('status', 'publish')->withCount('questions')->paginate(5);
        return view("dashboard", compact('exams'));
    }
    public function exam_detail($slug)
    {
        $exam = exams_model::whereSlug($slug)->with('my_result', 'topTen.top_users')->withCount('questions')->first() ?? abort(404, "EXAM NOT FOUND.");
        return view("exam_detail", compact('exam'));
    }
    public function exam_join($slug)
    {
        $exam = exams_model::whereSlug($slug)->with('questions')->first() ?? abort(404, 'EXAM NOT FOUND.');
        return view('exam_join', compact('exam'));
    }
    public function exam_result(Request $request, $slug)
    {
        $exam = exams_model::with('questions')->whereSlug($slug)->first() ?? abort(404, 'EXAM NOT FOUND.');
        $correct = 0;

        if ($exam->my_result()) {
            abort(404, 'You have join this exam before.');
        }

        foreach ($exam->questions as $question) {
            answers_model::create([
                'user_id' => auth()->user()->id,
                'question_id' => $question->id,
                'user_select' => $request->post($question->id)
            ]);
            if ($question->correct_answer === $request->post($question->id)) {
                $correct += 1;
            }
        }
        $point = round((100 / count($exam->questions)) * $correct, 2);
        $wrong = count($exam->questions) - $correct;
        results_model::create([
            'user_id' => auth()->user()->id,
            'exam_id' => $exam->id,
            'point' => $point,
            'correct_number' => $correct,
            'wrong_number' => $wrong
        ]);
        return redirect()->route('exam.detail', $exam->slug)->with('success', 'YOUR SUCCESSFULLY TO EXAM. Your Point:' . $point);
    }
}
