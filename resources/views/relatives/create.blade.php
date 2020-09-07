@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Add New Relative</div>

        <div class="card-body">
          <form action="{{ route('relatives.store') }}" method="post">
            @csrf
            
            <div class="form-group">
              <label for="name">Relative Name:</label>
              <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="form-group">
              <label for="sex">Sex:</label>
              <select name="sex" id="sex" class="form-control">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>

            <div class="form-group">
              <label for="phone">Phone No:</label>
              <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
            </div>

            <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
            </div>

            <div class="form-group">
             <button type="submit" class="btn btn-md btn-outline-primary">Save Relative</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
