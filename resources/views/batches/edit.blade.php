@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add students to <strong>{{ $batch->name }}</strong></div>

                <div class="card-body">
                  @if (count($students) > 0 )
                    <form action="{{ route('batches.update', $batch->id) }}" method="post">
                      @csrf
                      @method('PATCH')
                      
                      @foreach ($students as $student)
                        <div class="form-group">
                          <input type="checkbox" name="students[]" value="{{ $student->id }}"
                            {{ $batch->hasAnyStudent($student->name)?'checked':''}}
                          >
                          <label>{{ $student->name }}</label>
                        </div>
                      @endforeach

                      <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary btn-md">Save Changes</button>
                      </div>
                    </form>
                  @else
                    <div class="alert alert-warning text-danger">No students found in the database</div>
                  @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
