@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                  <div class="flex align-items-center">
                    Add New Student
                    <div class="float-right">
                      <a href="{{ route('students.index') }}" class="btn btn-outline-secondary btn-sm"> << Back to all students</a>
                    </div>
                  </div>
                </div>

                <div class="card-body">
                  
                  <form method="POST" action="{{ route('students.store') }}">
                    @csrf                                              
                            
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">Student Name:</label>

                      <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                        @error('name')
                          <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                                                     

                    <div class="form-group row">
                      <label for="sex" class="col-md-4 col-form-label text-md-right">Gender:</label>
                      <div class="col-md-6">                                        
                      <select name="sex" id="sex" class="form-control">
                        <option value="">Select gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>

                      @error('sex')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>
                    </div>                                
                                            
                    <div class="form-group row">
                      <label for="phone" class="col-md-4 col-form-label text-md-right">Phone:</label>
                      <div class="col-md-6">
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone">
                        @error('phone')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right">Email:</label>

                      <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                        @error('email')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="course" class="col-md-4 col-form-label text-md-right">{{ __('Course of interest') }}:</label>
        
                      <div class="col-md-6">
                          <select name="course" id="course" class="form-control">
                            <option value="">Select course of interest</option>
                            @foreach ($courses as $course)
                              <option value="{{ $course->name }}">{{ $course->name }}</option>
                            @endforeach
                          </select>
        
                          @error('course')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>
                                                        
                    <div class="form-group row">
                      <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-outline-primary btn-md btn-block">
                          Save Student
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








