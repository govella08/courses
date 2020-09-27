<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $departments = Department::all();
      //dd($departments);
      return view ('departments.index')->with('departments', $departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view ('departments.create');
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
        'code'  => 'required|min:2',
        'name'  => 'required|min:3'
      ]);

      $department = new Department;
      $department->code = $request->code;
      $department->name = $request->name;
      $department->save();

      return redirect()
      ->route('departments.index')
      ->with('message', 'Department information saved successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
      return view ('departments.show')->with([
        'department'  => $department
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
      return view ('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
      $data = $this->validate($request, [
        'code'  => 'required|min:2',
        'name'  => 'required|min:3'
      ]);

      $department->update($data);

      return redirect()
      ->route('departments.index')
      ->with('message', 'Department information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
      $department->delete();

      return redirect()
      ->route('departments.index')
      ->with('message', 'Department information deleted successfully');
    }
}
