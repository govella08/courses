@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Documents') }}</div>

        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif

          <form action="{{ route('documents.store') }}" method="post" enctype="multipart/form-data">
            @csrf            

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Document name') }}:</label>

              <div class="col-md-6">
                  <select name="name" id="name" class="form-control">
                    <option value="">Select document name</option>
                    
                      <option value="Student Registration Form">Student Registration Form</option>
                      <option value="Course List">Course List</option>                      
                    
                  </select>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Related department') }}:</label>

              <div class="col-md-6">
                  <select name="department" id="department" class="form-control">
                    <option value="">Select department related to this document</option>
                    @foreach ($departments as $department)
                      <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                  </select>

                  @error('department')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Choose file') }}:</label>

              <div class="col-md-6">
                  <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file">

                  @error('file')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>


            <div class="form-group row">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-outline-primary btn-block">Upload Document</button>
              </div>
            </div>
            
          </form>
          <hr>
          
          <div class="documents mt-4" style="background-color: border-radius: 4px;">
            @if (count($documents) > 0)
              <table class="table table-hover table-borderless table-md">
                <tr>
                  <th>#</th>
                  <th>Document name</th>
                  <th>Department</th>
                  <th>Preview</th>
                  <th>Delete</th>
                </tr>
                @foreach ($documents as $key=>$document)
                  <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $document->name }}</td>
                    <td>{{ $document->department->code }}</td>
                    <td><a title="Preview this document" href="{{ route('documents.show', $document) }}" class="btn btn-outline-info btn-sm"><i class="fas fa-eye"></i> Preview</a></td>
                    <td><a title="Delete this document" href="#" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i> Delete</a></td>
                  </tr>
                @endforeach
              </table>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
