@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <div class="flex justify-content-center">
            {{ __('Preview ') }} <strong>{{ $document->name }}</strong>
            <div class="float-right">
              <a href="{{ route('documents.index') }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="preview">
            <embed src="{{ asset($document->location) }}" type="application/pdf" style="width: 100%; height: 550px;">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
