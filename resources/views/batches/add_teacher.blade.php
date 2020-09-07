@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Teacher') }}</div>

                <div class="card-body">
                    @if (count($teachers) > 0 )
                        <form action="{{ route('batches.update_teacher', $batch) }}" method="post">
                          @csrf
                          @method('PATCH')
                          @foreach ($teachers as $teacher)
                            <div class="form-group">
                              <input type="checkbox" name="teachers[]" value="{{ $teacher->id }}"
                               {{ $batch->hasAnyTeacher($teacher->name)?'checked':''}}
                              >
                              <label>{{ $teacher->name }}</label>
                            </div>
                          @endforeach

                          <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-md">Update Batch</button>
                          </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
