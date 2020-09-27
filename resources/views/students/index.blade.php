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
							<a href="{{ route('students.create') }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-plus"></i></a>
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
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover table-sm">                                
                                <caption style="caption-side: top;" class="text-info">List of students</caption>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Middle Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Sex</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Batch Status</th>
                                        <th scope="col" class="pl-5">Actions</th>
                                    </tr>
                                </thead>
                               
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($students as $student)
                                    <tbody>
                                        <tr>
                                        <td>{{ $no++ }}</td>
                                        <td><a href="{{ route('students.show', $student->id) }}">{{ $student->first_name }}</a></td>
                                        <td>{{ $student->middle_name }}</td>
                                        <td>{{ $student->last_name }}</td>
                                        <td>{{ $student->sex }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ implode(', ', $student->batches()->get()->pluck('name')->toArray()) }}</td>
                                        <td class="float-right">
                                            <a href="{{ route('students.relatives', $student->id)  }}" class="btn btn-sm btn-outline-primary float-left">Assign Relative</a>
                                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-outline-primary float-left ml-1">Edit</a>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="post" class="float-left align-items-right ml-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
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
