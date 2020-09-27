@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                  <div class="flex align-items-center">
                    All Batches
                  </div>
                </div>

                <div class="card-body">
                  @if (count($batches) > 0)
                    <table class="table table-hover table-sm">
                      <tr>
                        <th>Batch</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th class="float-right">Assign Students</th>
                      </tr>
                      @foreach ($batches as $batch)
                        <tr>
                          <td><a href="{{ route('batches.show', $batch->id) }}">{{ $batch->name }}</a></td>
                          <td>{{ $batch->start_date }}</td>
                          <td>{{ $batch->end_date }}</td>
                          <td>{{ $batch->status }}</td>
                          <td>
                            <a href="{{ route('batches.edit', $batch->id) }}" class="btn btn-sm btn-outline-primary float-right">Assign Students</a>
                          </td>
                        </tr>
                      @endforeach
                    </table>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
