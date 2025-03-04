<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\questions_model;
use App\Models\exams_model;
use Illuminate\Http\Request;

class questions_cont_admin extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $exam = exams_model::whereId($id)->with('questions')->first() ?? abort(404, 'QUIZ NOT FOUND');
        return view('admin.questions.list', compact('exam'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $exam = exams_model::find($id);
        return view('admin.questions.create', compact('exam'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request->post();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
