@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <div class="flex align-items-center">
                        Course: <strong class="text-info"> {{ $course->name }}</strong> &nbsp; | &nbsp; Host Department: <strong class="text-info">{{ $course->department->code }}</strong>
                        <div class="float-right">
                            <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary btn-sm">All Courses</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    
                    <div class="topics">
                      <p>Topics to be covered in this course:</p>
                        @if (count($course->topics) > 0)
                          <table class="table table-hover table-borderless table-sm">                            
                            <tr>
                              
                            </tr>
                            @foreach ($course->topics as $key=>$topic)
                            <tr> 
                              <td>{{ ++$key }}. </td>                              
                              <td>{{ $topic->name }}</td>                                                        
                              <td>
                                <a title="Add notes to this topic" class="btn btn-sm btn-outline-primary" href="{{ route('notes.create', $topic) }}"><i class="fas fa-cloud-upload-alt"></i></a>
                                <a title="Download notes for this topic" class="btn btn-sm btn-outline-primary" href="{{ route('topics.show', $topic) }}"><i class="fas fa-cloud-download-alt"></i></a>
                                <form action="{{ route('topics.destroy', $topic->id) }}" method="post" style="display: inline-block">
                                  @csrf
                                  @method('DELETE')
                                  <button title="Delete this topic" class="btn btn-outline-danger btn-sm" href="{{ route('topics.destroy', $topic) }}"> <i class="fas fa-trash-alt"></i></button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                          </table>
                          @else 
                          <div class="alert alert-warning text-danger">No topics found for this course</div>
                        @endif                   
                    </div>
                    
                    <hr>

                    <div class="duration">
                      <p>Course duration: <strong> {{ $course->duration }} </strong></p>
                    </div>

                    <hr>

                    <div class="fee">
                      <p>Course fee: <strong> {{ "Tsh ".number_format($course->fee, 0) }} </strong></p>
                    </div>

                    <hr>

                    <div class="actions">
                        <a href="{{ route('topics.create', $course->id) }}" class="btn btn-sm btn-outline-primary ">Add topics</a>
                        <a href="{{ route('batches.create', $course->id) }}" class="btn btn-sm btn-outline-primary">Create batch</a>                        
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i> Edit course</a>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-print"></i> Print Course Description</a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="post" style="display: inline-block">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete this course</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
              <div class="card-header">Batches in <strong>{{ $course->name }}</strong></div>
              <div class="card-body">
                <div class="batches">
                  Batches:
                  <table class="table table-hover table-borderless">
                    <tr>
                      <th>Batch Name</th>
                      <th>Status</th>
                      <th>Students</th>
                    </tr>
                    @foreach ($course->batches as $key=>$batch)
                      <tr>
                        <td><a href="{{ route('batches.show', $batch->id) }}">{{ $batch->name }}</a></td>
                        <td><a href="#"></a>{{ $batch->status }}</td>
                        <td>{{ $batch->students->count() }}</td>
                      </tr>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
