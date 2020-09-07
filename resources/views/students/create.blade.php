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
                      <a href="{{ route('students.index') }}" class="btn btn-outline-secondary btn-sm"> << Back</a>
                    </div>
                  </div>
                </div>

                <div class="card-body">
                  
                  <form method="POST" action="{{ route('students.store') }}">
                        @csrf
                       
                        <div class="row justify-content-center">
                            <div class="col-md-5"> <!-- START -->
                                 <div class="form-group row">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-right">FirstName:</label>

                                    <div class="col-md-8">
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>

                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="middle_name" class="col-md-4 col-form-label text-md-right">MiddleName:</label>

                                    <div class="col-md-8">
                                        <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" autocomplete="middle_name">

                                        @error('middle_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-right">LastName:</label>

                                    <div class="col-md-8">
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name">

                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="dob" class="col-md-4 col-form-label text-md-right">DoB:</label>

                                    <div class="col-md-8">
                                        <input id="dob" type="text" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" autocomplete="dob">

                                        @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>   

                                <div class="form-group row">
                                    <label for="pob" class="col-md-4 col-form-label text-md-right">PlaceOfBirth:</label>

                                    <div class="col-md-8">
                                        <input id="pob" type="text" class="form-control @error('pob') is-invalid @enderror" name="pob" value="{{ old('pob') }}" autocomplete="pob">

                                        @error('pob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>    

                                <div class="form-group row">
                                    <label for="sex" class="col-md-4 col-form-label text-md-right">Sex:</label>
                                    <div class="col-md-8">                                        
                                    <select name="sex" id="sex" class="form-control">
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
                            </div> <!-- END -->

                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label for="marital_status" class="col-md-4 col-form-label text-md-right">MaritalStatus:</label>

                                    <div class="col-md-8">
                                        <input id="marital_status" type="text" class="form-control @error('marital_status') is-invalid @enderror" name="marital_status" value="{{ old('marital_status') }}" autocomplete="marital_status">

                                        @error('marital_status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">Phone:</label>
                                    <div class="col-md-8">
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

                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nationality" class="col-md-4 col-form-label text-md-right">Nationality:</label>

                                    <div class="col-md-8">
                                        <select name="nationality" id="nationality" class="form-control">
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="DRC Congo">DRC Congo</option>
                                        </select>

                                        @error('nationality')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="current_address" class="col-md-4 col-form-label text-md-right">Address:</label>

                                    <div class="col-md-8">
                                        <input id="current_address" type="text" class="form-control @error('current_address') is-invalid @enderror" name="current_address" value="{{ old('current_address') }}" autocomplete="current_address">

                                        @error('current_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="photo" class="col-md-4 col-form-label text-md-right">Photo:</label>

                                    <div class="col-md-8">
                                        <input id="photo" type="text" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" autocomplete="photo">

                                        @error('photo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <hr>
                        <div class="row justify-content-center">
                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-outline-primary btn-md">
                                            Save Student
                                        </button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection








