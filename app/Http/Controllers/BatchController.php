<?php

namespace App\Http\Controllers;

use App\Batch;
use App\Course;
use App\Student;
use App\User;
use Illuminate\Http\Request;

class BatchController extends Controller
{

  // public function __construct()
  // {
  //   return $this->middleware('auth');
  // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $batches =  Batch::all();
      return view ('batches.index', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
      return view ('batches.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'name'        => 'required',
        'start_date'  => 'required',
        'end_date'    => 'required',
        'course_id'   => 'required',
      ]);

      $batch = new Batch;

      $batch->name        = $request->name;
      $batch->start_date  = $request->start_date;
      $batch->end_date    = $request->end_date;
      $batch->status      = 'In progress';
      $batch->course_id   = $request->course_id;

      $batch->save();
      
      return redirect()
      ->route('batches.show', $batch->id)
      ->with('message', 'Batch created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch, Request $request)
    {
      $request->session()->put('batch', $batch->id);
      return view ('batches.show', compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(Batch $batch)
    {
      $students = Student::all();
      return view ('batches.edit', compact('batch', 'students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batch $batch)
    {
      $batch->students()->sync($request->students);

      return redirect()
      ->route('batches.show', $batch)
      ->with('message', 'Student(s) assigned to batch');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
      $batch->students()->detach();
      $batch->delete();
      return redirect()
      ->back()
      ->with('status', 'Batch deleted successfully');
    }

    public function add_teacher($id) {
      $batch = Batch::find($id);
      $teachers = User::whereHas('roles', function ($role) {
        $role->where('name', 'teacher');
      })->get();
      return view('batches.add_teacher', compact('teachers', 'batch'));
    }

    public function update_teacher (Request $request, Batch $batch) {
      $batch->users()->sync($request->teachers);
      return redirect()->route('batches.show', $id);
    }

}
