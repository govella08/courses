<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Note;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Topic $topic)
    {
      return view ('notes.create', compact('topic'));
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
        'topic_id'    => 'required',
        'file'        => 'required'
      ]);

      $topic_id = (Integer)$request->topic_id; 
      $topic = $request->topic;
      $topic = str_replace(' ', '', $topic);
      

      $note = new Note;
      $note->topic_id = $topic_id;                 
      if($request->file('file')) {      
        $file = $request->file('file');
        $ext = strtolower($file->getClientOriginalExtension());
        
        $file_name = $topic.'.'.time().'.'.$ext;
        
        $destination = 'uploads/documents/notes/'.$file_name;
        $file->move('uploads/documents/notes/', $file_name);
      }

      $note->notes = $destination;
      $note->topic_id = $topic_id;
      
      $note->save();
      return redirect()->route('courses.show', $request->session()->get('course'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
     //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
