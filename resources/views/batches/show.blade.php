@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Batch: <a href="{{ route('batches.show', $batch->id ) }}"><strong>{{ $batch->name }}</strong></a> &nbsp; | &nbsp; Course: <a href="{{ route('courses.show', $batch->course->id) }}"><strong>{{ $batch->course->name }}</strong></a>  &nbsp; | &nbsp;  Department: <span class="text-primary"> {{ $batch->course->department->code }}</span></div>

                <div class="card-body">
                  <div class="row justify-content-center">
                    <div class="col-md-12">
                      <a href="{{ route('batches.edit', $batch->id) }}" class="btn btn-md btn-outline-secondary">Add Students to this batch</a>
                      <hr>
                      @if (count($batch->students) > 0)
                      <table class="table table-borderless table-hover">
                      <caption class="text-info" style="caption-side: top;">Students in this batch <span class="badge badge-secondary">{{ $batch->students->count() }}</span></caption>
                      <tr style="border-bottom: 1px solid #333;">
                        <th>#</th> 
                        <th><i class="fas fa-user-graduate"></i> Student Name</th>
                        <th><i class="far fa-check-circle"></i> Paid</th>
                        <th><i class="fas fa-coins"></i> Add Payment</th>
                      </tr>
                      @php
                        $count = 1;
                      @endphp                    
                      @foreach ($batch->students as $student)
                      @if ($student->receipts->sum('amount') < $batch->course->fee)
                        @php
                            $class = 'text-danger';
                        @endphp              
                        @else
                        @php
                            $class = 'text-secondary';
                        @endphp
                      @endif
                        <tr>
                          <td>{{ $count++ }}</td>
                          <td><a href="{{ route('students.show', $student->id) }}">{{ $student->first_name }} {{ $student->last_name }}</a></td>                        
                          <td class="{{ $class }}">{{ 'Tsh '.number_format($student->receipts->sum('amount'), '0', '.', ',' ) }}</td>
                          <td><a title="Add payment for this student" class="btn btn-sm btn-outline-primary" href="{{ route('receipts.create', $student ) }}"><i class="fas fa-hand-holding-usd"></i></a></td>
                        </tr>
                      @endforeach
                    </table>
                  @endif
                    </div>

                    
                  </div>
                  
                </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">Teachers</div>
            <div class="card-body">
              <div class="col-md-12">
                <a href="{{ route('batches.add_teacher', $batch->id) }}" class="btn btn-md btn-outline-secondary">Add Teachers to this batch</a>
                <hr>
                <table class="table table-borderless table-hover table-sm">
                  <caption class="text-info" style="caption-side: top;">Teachers in this batch</caption>
                  <tr style="border-bottom: 1px solid #333;">
                    <th>#</th>
                    <th>Teacher Name:</th>
                    <th>Delete</th>
                  </tr>        
                  @foreach ($batch->users as $key=>$user)
                    <tr>
                      <td>{{ ++$key }}</td>
                      <td>{{ $user->name }}</td>
                      <td><a title="Delete teacher" class="btn btn-sm btn-outline-danger" href="#"><i class="far fa-trash-alt"></i></a></td>
                    </tr>                      
                  @endforeach                       
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
