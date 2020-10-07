<?php

namespace App\Http\Controllers;

use App\Document;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view ('documents.index')->with([
        'departments' => Department::all(),
        'documents'   => Document::all()
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
        'file'          => 'required',
        'name'          => 'required',
        'department' => 'required'
      ]);

      $department_id = (Integer)$request->department; 
      $name = $request->name;
      $name = str_replace(' ', '', $name);
      

      $document = new Document;
      $document->department_id = $department_id;                 
      if($request->file('file')) {      
        $file = $request->file('file');
        $ext = strtolower($file->getClientOriginalExtension());
        
        $file_name = uniqid($name, true).'.'.time().'.'.$ext;
        
        $destination = 'uploads/documents/documents/'.$file_name;
        $file->move('uploads/documents/documents/', $file_name);
      }

      $document->name = $request->name;
      $document->location = $destination;
      $document->department_id = $department_id;
      
      $document->save();
      return redirect()->route('documents.index')
      ->with('status', 'Document uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
      return View::make('documents.show')->with('document', $document);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
