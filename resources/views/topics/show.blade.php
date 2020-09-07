@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="flex align-items-center">
                        Course Details: <strong> {{ $course->name }}</strong>
                        <div class="float-right">
                            <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary btn-sm">All Courses</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Host Department: <strong class="text-info">{{ $course->department->name }}</strong>
                    <div class="topics">
                        <ul class="list-group list-group-flush mt-3">
                            <li class="list-group-item">Topic one</li>
                            <li class="list-group-item">Topic two</li>
                            <li class="list-group-item">Topic three</li>
                            <li class="list-group-item">Topic five is too looong</li>
                        </ul>
                    </div>

                    <div class="duration">
                        <p>This course is taught in <strong> {{ $course->duration }} </strong></p>
                    </div>

                    <div class="fee">
                        <p>Course fee: <strong> {{ "Tsh ".number_format($course->fee, 0) }} </strong></p>
                    </div>
                    <div class="actions mt-5">
                        <a href="{{ route('topics.create', $course->id) }}" class="btn btn-sm btn-outline-info float-left">Add topics to this course</a>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-outline-info float-left">Create batch for this course</a>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-outline-info float-left ml-1">Do something on this course</a>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-outline-warning float-left ml-1">Edit this course</a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="post" class="float-left align-items-right ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete this course</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
