@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Receipt Information') }}</div>

                <div class="card-body">
                    <form action="{{ route('receipts.store') }}" method="post" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group row">
                        <label for="receipt_number" class="col-md-4 col-form-label text-md-right">{{ __('Receipt number') }}</label>

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
                        <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Issue date') }}</label>

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
                        <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                        <div class="col-md-6">
                            <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>

                            @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      
                      <input type="hidden" name="student_id" value="{{ $student }}">

                      <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Upload Receipt') }}</label>

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

                        <div class="col-md-6">
                            <button type="submit" class="btn btn-outline-primary">Save Receipt</button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
