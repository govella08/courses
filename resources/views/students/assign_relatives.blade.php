@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Assign Relatives to <strong>{{ $student->name }}</strong></div>
                <div class="card-body">
                    @if (session('message'))
                            <div class="alert alert-success p-2" role="alert">
                                    {{ session('message') }}
                            </div>
                    @endif

                    @if (count($relatives) > 0)                          
                      <form action="{{ route('students.assigning_relatives', $student) }}" method="post">
                        @csrf
                        @method('PATCH')

                        @foreach ($relatives as $relative)
                          <div class="form-group">
                            <input type="checkbox" name="relatives[]" value="{{ $relative->id }}">
                            <label>{{ $relative->name }}</label>
                          </div>                          
                        @endforeach
                          <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-outline-primary">Update Student</button>
                          </div>
                        </form>
                    @else
                        <div class="alert alert-warning text-danger">No relatives were found</div>
                    @endif
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
