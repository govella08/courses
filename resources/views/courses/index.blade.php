@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
					<div class="flex align-items-center">
						Courses
						<div class="float-right">
							<a title="Add new course" href="{{ route('courses.create') }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-plus"></i> Add Course</a>
						</div>
					</div>
				</div>

                <div class="card-body">
                    @if (session('message'))
                            <div class="alert alert-success p-2" role="alert">
                                    {{ session('message') }}
                            </div>
                    @endif

                    @if (count($courses) > 0)
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover table-sm">
                                
                                <caption style="caption-side: top;" class="text-info">List of Courses</caption>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Fee</th>
                                        <th scope="col">Department</th>
                                        <th scope="col" class="pl-5">Actions</th>
                                    </tr>
                                </thead>
                                
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($courses as $course)
                                    <tbody>
                                        <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $course->code }}</td>
                                        <td><a href="{{ route('courses.show', $course->id) }}">{{ $course->name }}</a></td>
                                        <td>{{ $course->duration }}</td>
                                        <td>{{ "Tsh ".number_format($course->fee, 0) }}</td>
                                        <td>{{ $course->department->code }}</td>
                                        <td class="float-right">
                                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-outline-primary float-left"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('courses.destroy', $course->id) }}" method="post" class="float-left align-items-right ml-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                            <a href="{{ route('batches.create', $course->id) }}" class="btn btn-outline-info btn-sm ml-1">Create batch</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                        </table>
                        </div>
                    @else
                        <div class="alert alert-warning text-danger">No courses were found</div>
                    @endif
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
