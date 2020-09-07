<?php

namespace App\Http\Controllers;

use App\Student;
use App\Relative;
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
      return view ('students.create');
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
        'first_name'    => 'required',
        'middle_name'   => 'required',
        'last_name'     => 'required',
        'dob'           => 'required',
        'pob'           => 'required',
        'sex'           => 'required',
        'marital_status'=> 'required',
        'phone'         => 'required',
        'email'         => 'required',
        'current_address'         => 'required',
        'nationality'   => 'required',
        'photo'         => 'required'
      ]);

      $student = new Student;
      $student->first_name = $request->first_name;
      $student->middle_name = $request->middle_name;
      $student->last_name = $request->last_name;
      $student->dob = $request->dob;
      $student->pob = $request->pob;
      $student->sex = $request->sex;
      $student->marital_status = $request->marital_status;
      $student->phone = $request->phone;
      $student->email = $request->email;
      $student->current_address = $request->current_address;
      $student->nationality = $request->nationality;
      $student->photo = $request->photo;
      $student->batch_status = "Unbatched";

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
