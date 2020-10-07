@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
					<div class="flex align-items-center">
						All Students
						<div class="float-right">
							<a title="Add new student" href="{{ route('students.create') }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-plus"></i></a>
						</div>
					</div>
				</div>

                <div class="card-body">
                  @if (session('message'))
                    <div class="alert alert-success p-2" role="alert">
                      {{ session('message') }}
                    </div>
                  @endif

                @if (count($students) > 0)
                    <table class="table table-hover table-md">                                
                      <caption style="caption-side: top;" class="text-info">List of students</caption>
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Student Name</th>                                        
                          <th scope="col">Sex</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Batch Status</th>
                          <th scope="col">Course Interested</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                        
                        @php
                          $no = 1;
                        @endphp
                        @foreach ($students as $student)
                          <tbody>
                            <tr>
                            <td>{{ $no++ }}</td>
                            <td><a href="{{ route('students.show', $student->id) }}">{{ $student->name }}</a></td>
                            <td>{{ $student->sex }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->batch_status }}</td>
                            <td>{{ $student->course_interested }}</td>
                            <td>                                            
                              <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-outline-primary float-left ml-1"><i class="fas fa-edit"></i></a>
                              <form action="{{ route('students.destroy', $student->id) }}" method="post" class="float-left align-items-right ml-1">
                                @csrf
                                @method('DELETE')
                                <button title="Delete {{ $student->first_name }}" type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>
                              </form>
                            </td>
                          </tr>
                        </tbody>
                      @endforeach
                  </table>
                </div>
                @else
                    <div class="alert alert-warning text-danger">No students found in the database</div>
                @endif
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
