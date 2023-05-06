@extends('dashboard.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Loan Decision') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('loan.update', ['id' => $loan->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Loan Status') }}</label>

                                <div class="col-md-6">
                                    <select id="status" class="form-control @error('status') isapproved-invalid @enderror" name="status" required>
                                        <option value="pending" @if($loan->status === 'pending') selected @endif>{{ __('Pending') }}</option>
                                        <option value="approved" @if($loan->status === 'approved') selected @endif>{{ __('Approved') }}</option>
                                        <option value="rejected" @if($loan->status === 'rejected') selected @endif>{{ __('Rejected') }}</option>
                                        <option value="paid" @if($loan->status === 'paid') selected @endif>{{ __('Paid') }}</option>
                                    </select>

                                    
                                        {{-- <form action="{{ route('loans.update', $loan->id) }}" method="post">
                                            @csrf
                                            @method('PUT')

                                            <label for="paid_amount">Paid Amount:</label>
                                            <input type="text" name="paid_amount" id="paid_amount">

                                            <button type="submit">Update Loan</button>
                                        </form> --}}

                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Loan Decision') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
