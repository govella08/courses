@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
					<div class="flex align-items-center">
						All Relatives
						<div class="float-right">
							<a href="{{ route('relatives.create') }}" class="btn btn-outline-secondary btn-sm">+</a>
						</div>
					</div>
				</div>

                <div class="card-body">
                    @if (session('message'))
                            <div class="alert alert-success p-2" role="alert">
                                    {{ session('message') }}
                            </div>
                    @endif

                    @if (count($relatives) > 0)
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover table-sm">
                                
                                <caption style="caption-side: top;" class="text-info">List of relatives</caption>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">FullName</th>
                                        <th scope="col">Sex</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Address</th>
                                        <th scope="col" class="pl-5">Actions</th>
                                    </tr>
                                </thead>
                                
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($relatives as $relative)
                                    <tbody>
                                        <tr>
                                        <td>{{ $no++ }}</td>
                                        <td><a href="{{ route('relatives.show', $relative->id) }}">{{ $relative->name }}</a></td>
                                        <td>{{ $relative->sex }}</td>
                                        <td>{{ $relative->phone }}</td>
                                        <td>{{ $relative->address }}</td>
                                        <td class="float-right">
                                            <a href="{{ route('relatives.edit', $relative->id) }}" class="btn btn-sm btn-outline-primary float-left">Edit</a>
                                            <form action="{{ route('relatives.destroy', $relative->id) }}" method="post" class="float-left align-items-right ml-1">
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
                        <div class="alert alert-warning text-danger">No relatives were found</div>
                    @endif
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
