@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
					<div class="flex align-items-center">
						Departments
						<div class="float-right">
							<a href="{{ route('departments.create') }}" class="btn btn-outline-secondary btn-sm">+</a>
						</div>
					</div>
				</div>

                <div class="card-body">
                    @if (session('message'))
                            <div class="alert alert-success p-2" role="alert">
                                    {{ session('message') }}
                            </div>
                    @endif

                    @if (count($departments) > 0)
                        <table class="table table-hover table-sm">
                            <caption style="caption-side: top;" class="text-info">List of Departments</caption>
                            <tr>
                                <th>#</th>
                                <th>Department Code</th>
                                <th>Department Name</th>
                                <th>Actions</th>
                            </tr>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($departments as $department)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td><a href="{{ route('departments.show', $department->id) }}">{{ $department->code }}</a></td>
                                    <td><a href="{{ route('departments.show', $department->id) }}">{{ $department->name }}</a></td>
                                    <td>
                                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-outline-primary float-left">Edit</a>
                                        <form action="{{ route('departments.destroy', $department->id) }}" method="post" class="float-left align-items-right ml-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <div class="alert alert-warning text-danger">No departements were found</div>
                    @endif
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
