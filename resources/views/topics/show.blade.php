@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <div class="flex justify-content-center">
            <strong>{{ $topic->name }}</strong>{{ __(' notes') }}
            <div class="float-right">
            <a href="{{ route('courses.show', $topic->course->id) }}" type="submit" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
            </div>
          </div>          
        </div>

        <div class="card-body">
          <embed src="{{ asset($topic->note->notes) }}" type="application/pdf" style="width: 100%; height: 500px;">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
