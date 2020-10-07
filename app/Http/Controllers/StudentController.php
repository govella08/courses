<?php

namespace App\Http\Controllers;

use App\Student;
use App\Relative;
use App\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $students = Student::all();
      return view ('students.index', [
        'students' => $students
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
      return view ('students.create')->with([
        'courses' => Course::all(),
      ]);
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
        'name'    => 'required',        
        'sex'     => 'required',
        'phone'   => 'required',
        'course'  => 'required'
      ]);

      $student = new Student;
      $student->name = $request->name;
      $student->sex = $request->sex;
      $student->phone = $request->phone;
      $student->email = $request->email;
      $student->course_interested = $request->course;

      $student->save();

      return redirect()
      ->route('students.index')
      ->with('message', 'Student information saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function assign_relatives (Student $student)
    {
      $relatives = Relative::all();
      return view ('students.assign_relatives')->with([
        'student'   => $student,
        'relatives' => $relatives
      ]);
    } 

    public function assigning_relatives (Request $request, Student $student)
    {
      $student->relatives()->sync($request->relatives);
      return redirect()
      ->route('students.index')
      ->with('message', 'Relative assigned successfully');
    } 

}
