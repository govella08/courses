@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Add Receipt Information') }}</div>

                <div class="card-body">
                    <form action="{{ route('receipts.store') }}" method="post" enctype="multipart/form-data">
                      @csrf                 

                      <div class="form-group row">
                        <label for="receipt_number" class="col-md-4 col-form-label text-md-right">{{ __('Receipt number') }}:</label>

                        <div class="col-md-6">
                          <input id="receipt_number" type="text" class="form-control @error('receipt_number') is-invalid @enderror" name="receipt_number" value="{{ old('receipt_number') }}" required autocomplete="receipt_number" autofocus>

                          @error('receipt_number')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Issue date') }}:</label>

                        <div class="col-md-6">
                            <input id="date" type="text" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>

                          @error('date')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}:</label>

                        <div class="col-md-6">
                            <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>

                            @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="batch" class="col-md-4 col-form-label text-md-right">{{ __('Batch') }}:</label>

                        <div class="col-md-6">
                            <select name="batch_id" id="batch_id" class="form-control">
                              <option value="">Select batch</option>
                              @foreach ($batches as $batch)
                                <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                              @endforeach
                            </select>

                            @error('batch')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      
                      <input type="hidden" name="student_id" value="{{ $student->id }}">

                      <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Upload Receipt') }}:</label>

                        <div class="col-md-6">
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required autofocus>

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>


                      <div class="form-group row">

                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-outline-primary btn-block">Save Receipt</button>
                        </div>
                      </div>
                    </form>
                    <hr>
                    <p class="text-info mt-4">Previous payments made by {{ $student->first_name }}:</p>
                    @if (count($student->receipts) > 0)
                      <table class="table table-hover table-sm">
                        <tr>
                          <th>#</th>
                          <th>Receipt Number</th>
                          <th>Amount</th>
                          <th>Issue Date</th>
                          <th>Course Paid For</th>
                          <th>Batch</th>
                          <th>Receipts</th>
                        </tr>
                        @foreach ($student->receipts as $key=>$receipt)
                          <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $receipt->number }}</td>
                            <td>{{ $receipt->amount }}</td>
                            <td>{{ $receipt->date }}</td>                            
                            <td>{{ $receipt->batch->course->name }}</td>
                            <td>{{ $receipt->batch->name }}</td>
                            <td><a title="View this image" href="{{ route('receipts.show', $receipt->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a></td>
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
