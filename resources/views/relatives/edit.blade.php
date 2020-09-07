@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Edit <strong>{{ $relative->name }}</strong> information</div>

        <div class="card-body">
          <form action="{{ route('relatives.update', $relative->id) }}" method="post">
            @csrf
            @method('PATCH')
            
            <div class="form-group">
              <label for="name">Relative Name:</label>
              <input type="text" name="name" id="name" class="form-control" value="{{ $relative->name }}">
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
              <input type="text" name="phone" id="phone" class="form-control" value="{{ $relative->phone }}">
            </div>

            <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" name="address" id="address" class="form-control" value="{{ $relative->address }}">
            </div>

            <div class="form-group">
             <button type="submit" class="btn btn-md btn-outline-primary">Update Relative</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
