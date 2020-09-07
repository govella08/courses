<?php

namespace App\Http\Controllers;

use App\Course;
use App\Department;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $courses = Course::all();
      $department = Department::find(1);
      
      return view ('courses.index')->with([
        'courses'     => $courses,
        'department'  => $department
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $departments = Department::all();
      return view ('courses.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate ($request, [
        'code'          => 'required',
        'name'          => 'required',
        'duration'      => 'required',
        'fee'           => 'required',
        'department_id' => 'required'
      ]);

      $course = new Course;
      $course->code           = $request->code;
      $course->name           = $request->name;
      $course->duration       = $request->duration;
      $course->fee            = $request->fee;
      $course->department_id  = $request->department_id;

      $course->save();

      return redirect()
      ->route('courses.index')
      ->with('message', 'Course information saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
      return view ('courses.show')->with([
        'course'      => $course
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
      $departments = Department::all();      

      return view ('courses.edit')->with([
        'course'      => $course,
        'departments' => $departments
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
      $data = $this->validate($request, [
        'code'          => 'required',
        'name'          => 'required',
        'duration'      => 'required',
        'fee'           => 'required',
        'department_id' => 'required'
      ]);

      $course->update($data);
      
      return redirect()
      ->route('courses.index')
      ->with('message', 'Course information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
      $course->delete();
      return redirect()
      ->route('courses.index')
      ->with('message', 'Course information deleted successfully');
    }
}
