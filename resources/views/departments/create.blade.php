@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                  <div class="flex align-items-center">
                    Add New Department
                    <div class="float-right">
                      <a href="{{ route('departments.index') }}" class="btn btn-outline-secondary btn-sm"> << Back</a>
                    </div>
                  </div>
                </div>

                <div class="card-body">
                  @if (session('status'))
                    <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                    </div>
                  @endif
                
                  <form method="POST" action="{{ route('departments.store') }}">
                      @csrf

                      <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Department Code:</label>

                        <div class="col-md-6">
                            <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" autocomplete="code" autofocus>

                            @error('code')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">Department Name:</label>

                          <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name">

                            @error('name')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                          <button type="submit" class="btn btn-outline-primary btn-sm">
                            Save Department
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








