@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Create batch for <strong>{{ $course->name }}</strong></div>

                <div class="card-body">
                  <form action="{{ route('batches.store') }}" method="post">
                    @csrf
                    
                    <div class="form-group">
                      <label for="name">Batch Name:</label>
                      <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="start_date">Start Date:</label>
                      <input type="text" name="start_date" id="start_date" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="end_date">End Date:</label>
                      <input type="text" name="end_date" id="end_date" class="form-control">
                    </div>

                    <input type="hidden" name="course_id" value="{{ $course->id }}">

                    <div class="form-group">
                      <button type="submit" class="btn btn-outline-primary">Save Batch</button>
                    </div>

                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
