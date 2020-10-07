@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <div class="flex justify-content-center">
            {{ $receipt->number }}
            <div class="float-right">
              <a href="{{ route('batches.show', $batch_id) }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-alt-circle-left"></i> Back</button>
            </div>
          </div>
        </div>

        <div class="card-body">

          <embed src="{{ asset($receipt->image) }}" style="width: 100%; height: 100%;">

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
