@extends('dashboard.app')
@section('content')

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome to loans Management</span></h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dash">Dashboard</a></li>
                                <li class="breadcrumb-item active">loans</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>

            <!-- /# row -->
            <section id="main-content">
                <div class="row">
           
                <div class="row">
                    <div class="col-md-">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-center">
                                        <h2> loan Details</h2>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('loans.index') }}"> Back</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>First Name:</strong>
                                        {{ $loan->user->firstname  }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Last Name:</strong>
                                        {{ $loan->user->lastname }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Gender:</strong>
                                        {{ $loan->user->gender }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Telephone:</strong>
                                        {{ $loan->user>telephone }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        {{ $loan->user->email }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Requested Amount</strong>
                                        {{ $loan->loan_amount }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Amount to be paid</strong>
                                        {{ $loan->total_amount }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Remaining amount</strong>
                                        {{ $loan->total_amount-$loan->paid_amount }}
                                    </div>
                                </div>
                                {{-- @can('loan-edit') --}}
                                    {{-- <a class="btn btn-success pull-right" href="{{ route('loans.edit',$loan->id) }}"> Edit</a> --}}
                                {{-- @endcan --}}
                            </div>
                            <!-- /# row --> 
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection