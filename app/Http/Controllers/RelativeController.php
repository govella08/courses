<?php

namespace App\Http\Controllers;

use App\Relative;
use Illuminate\Http\Request;

class RelativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $relatives = Relative::all();
      return view ('relatives.index', compact('relatives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view ('relatives.create');
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
        'name'      =>  'required',
        'sex'       =>  'required',
        'phone'     =>  'required',
        'address'   =>  'required'
      ]);

      $relative = new Relative;

      $relative->name      =  $request->name;
      $relative->sex       =  $request->sex;
      $relative->phone     =  $request->phone;
      $relative->address   =  $request->address;

      $relative->save();

      return redirect()
      ->route('relatives.index')
      ->with('message', 'Relative information saved successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Relative  $relative
     * @return \Illuminate\Http\Response
     */
    public function show(Relative $relative)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Relative  $relative
     * @return \Illuminate\Http\Response
     */
    public function edit(Relative $relative)
    {
      return view ('relatives.edit', compact('relative'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Relative  $relative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Relative $relative)
    {
      $data = $this->validate($request, [
        'name'      =>  'required',
        'sex'       =>  'required',
        'phone'     =>  'required',
        'address'   =>  'required'
      ]);

      $relative->update($data);

      return redirect()
      ->route('relatives.index')
      ->with('message', 'Relative information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Relative  $relative
     * @return \Illuminate\Http\Response
     */
    public function destroy(Relative $relative)
    {
        //
    }

}
