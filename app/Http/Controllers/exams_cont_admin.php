<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\exams_model;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use App\Http\Requests\ExamCreateRequest;
use App\Http\Requests\ExamUpdateRequest;
use Post;

class exams_cont_admin extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = exams_model::withCount('questions')->paginate(5);
        return view('admin.exams.list', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.exams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExamCreateRequest $request)
    {
        exams_model::create($request->post());
        return redirect()->route('exams.index')->with('success', 'NEW EXAM ADD SUCCESSFULLY...');
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
        $exam = exams_model::withCount('questions')->find($id) ?? abort(404, 'EXAM NOT FOUND');
        return view('admin.exams.edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExamUpdateRequest $request, string $id)
    {
        $exam = exams_model::find($id) ?? abort(404, 'EXAM NOT FOUND');
        exams_model::where('id', $id)->update($request->except(['_method', '_token']));
        return redirect()->route('exams.index')->with('success', 'EXAM UPDATE SUCCESSFULLY...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exam = exams_model::find($id) ?? abort(404, 'EXAM NOT FOUND');
        $exam->delete();
        return redirect()->route('exams.index')->with('success', 'EXAM DELETE SUCCESSFULLY...');
    }
}
