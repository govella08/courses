@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                  <div class="flex align-items-center">
                    Add Topics to {{ $course->name }}
                    <div class="float-right">
                      <a href="{{ route('courses.show', $course->id) }}" class="btn btn-outline-secondary btn-sm"> << Back to {{ $course->name }} course</a>
                    </div>
                  </div>
                </div>

                <div class="card-body">
                  @if (session('message'))
                      <div class="alert alert-success" role="alert">
                          {{ session('message') }}
                      </div>
                  @endif                  
    
                  <form method="POST" action="{{ route('topics.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Topic Name:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="hidden-form-course-id">
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary btn-sm">
                                    Save Topic
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection








