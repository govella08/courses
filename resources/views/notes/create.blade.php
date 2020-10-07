@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">{{ __('Upload notes for ') }} <strong>{{ $topic->name }}</strong></div>

        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif

          <form action="{{ route('notes.store') }}" method="post" enctype="multipart/form-data">
            @csrf                 

            

            <input type="hidden" name="topic" value="{{ $topic->name }}">
            
            <input type="hidden" name="topic_id" value="{{ $topic->id }}">

            <div class="form-group row">
              <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('File:') }}:</label>

              <div class="col-md-6">
                  <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" required autofocus>

                  @error('file')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>


            <div class="form-group row">

              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-outline-primary btn-block"><i class="fas fa-file-pdf"></i> Upload Notes</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
