@extends('dashboard.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                        <div class="container">
                        <div class="container">
                        <div class="container">
                <div class="card">
                    <div class="card-header">{{ __('Loan Decision') }}</div>

                    <div class="card-body">
                        <h5>Loan Requested Amount: {{ $loan->amount }} RWF</h5>

                        @if ($loan->status == 'pending')
                            <div class="alert alert-warning" role="alert">
                                {{ __('This Loan is still pending!') }}
                            </div>
                        @elseif($loan->status == 'approved')
                            <div class="alert alert-success" role="alert">
                                {{ __('This Loan has been approved!') }}
                            </div>
                        @elseif($loan->status == 'rejected')
                            <div class="alert alert-danger" role="alert">
                                {{ __('This Loan has been rejected!') }}
                            </div>
                        @elseif($loan->status == 'paid')
                            <div class="alert alert-primary" role="alert">
                                {{ __('Loan has been paid!') }}
                            </div>
                            @endif
                            </div>
                    </div>
                    </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    @endsection