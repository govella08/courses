@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="flex align-items-center">
                        <strong> {{ $department->name }} department</strong>
                        <div class="float-right">
                            <a href="{{ route('departments.index') }}" class="btn btn-outline-secondary btn-sm">All departments</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="courses">
                        <h4>Courses in {{ $department->name }} department:</h4>
                        <ul class="list-group list-group-flush mt-3">
                            @foreach ($department->courses as $course)
                                <li class="list-group-item"><a href="{{ route('courses.show', $course->id) }}">{{ $course->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="actions mt-5">
                        <a href="{{ route('courses.create') }}" class="btn btn-sm btn-outline-info float-left">Add New Course to this Department</a>
                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-outline-info float-left ml-1">Do something on this department</a>
                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-outline-warning float-left ml-1">Edit this department</a>
                        <form action="{{ route('departments.destroy', $department->id) }}" method="post" class="float-left align-items-right ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete this department</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
