<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::query()->with('user')->get();

        return Inertia::render('Teachers/Index', [
            'teachers' => $teachers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Teachers/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'label' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:choix,libre'],
        ]);

        Question::create([
            'label' => $request->input('label'),
            'type' => $request->input('type'),
        ]);

        session()->flash('flash.banner', 'La question a été ajoutée!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        // useless
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        return Inertia::render('Teachers/Edit', [
            'question' => $question,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $this->validate($request, [
            'label' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:choix,libre'],
        ]);

        $question->update([
            'label' => $request->input('label'),
            'type' => $request->input('type'),
        ]);

        session()->flash('flash.banner', 'La question a été modifiée!');

        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
