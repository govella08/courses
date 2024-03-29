@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                  <div class="flex align-items-center">
                    Edit Course: <strong>{{ $course->name }}</strong>
                    <div class="float-right">
                      <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary btn-sm"> << Back</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('courses.update', $course->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Course Code:</label>

                            <div class="col-md-6">
                                <input id="code" type="text" value="{{ $course->code }}" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" autocomplete="code" autofocus>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Course Name:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{ $course->name }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Course Duration:</label>

                            <div class="col-md-6">
                                <input id="duration" type="text" value="{{ $course->duration }}" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{ old('duration') }}" autocomplete="duration">

                                @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Course Fee:</label>

                            <div class="col-md-6">
                                <input id="fee" type="text" value="{{ $course->fee }}" class="form-control @error('fee') is-invalid @enderror" name="fee" value="{{ old('fee') }}" autocomplete="fee">

                                @error('fee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Host Department:</label>

                            <div class="col-md-6">
                                
                                <select name="department_id" id="department_id" class="form-control @error('department_id') is-invalid @enderror" value="{{ old('department_id') }}">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"> {{ $department->name }} </option>
                                    @endforeach
                                </select>

                                @error('department_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary btn-sm">
                                    Update Course
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
