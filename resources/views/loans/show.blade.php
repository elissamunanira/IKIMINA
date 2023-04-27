@extends('dashboard.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Loan Decision') }}</div>

                    <div class="card-body">
                        <h5>Loan Requested Amount: {{ $loan->amount }}</h5>

                        @if ($loan->status == 'approved')
                            <div class="alert alert-success" role="alert">
                                {{ __('Loan Approved!') }}
                            </div>
                        @elseif($loan->status == 'paid')
                            <div class="alert alert-danger" role="alert">
                                {{ __('Loan paid!') }}
                            </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
    @endsection