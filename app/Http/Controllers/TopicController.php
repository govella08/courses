<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Course;
use Illuminate\Http\Request;

class TopicController extends Controller
{

    public function create($id)
    {
      $course = Course::find($id);
      return view ('topics.create')->with('course', $course);
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'name'      => 'required',
        'course_id' => 'required'
      ]);

      $topic = new Topic;

      $topic->name      = $request->name;
      $topic->course_id = $request->course_id;
      $topic->course_id = (int)$topic->course_id;

      $topic->save();

      return redirect()
      ->route('topics.create', $request->course_id)
      ->with('message', 'New topic added successfully');
    }

    public function edit(Topic $topic)
    {
      //
    }

    public function update(Request $request, Topic $topic)
    {
      //
    }

    public function destroy(Topic $topic)
    {
      $topic->delete();

      return redirect()
      ->back()
      ->with('message', 'Topic deleted successfully');
    }
}
