@extends('dashboard.app')

@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome to Your Account</span></h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                {{-- <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dash">Dashboard</a></li>
                                <li class="breadcrumb-item active">My Account</li>
                            </ol>
                        </div>
                    </div>
                </div> --}}
                <!-- /# column -->
            </div>
            <section id="main-content">
                <div class="row"> 
                    <div class="col-md-12">
                                <center><h4 class="card-title"><strong>Loans</strong></h4></center>
                        <div class="card">
                            <div class="card-body">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Category</th>
                                                <th>Date requested</th>
                                                <th>Money Requested</th>
                                                <th>Money To Pay</th>
                                                <th>status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($loans as $loan)
                                                <tr>
                                                    <td>{{++$v}}</td>
                                                    <td>{{ $loan->loan_category }}</td>
                                                    <td>{{ $loan->created_at }}</td>
                                                    <td>{{ $loan->loan_amount }} RWF</td>
                                                    <td>{{ $loan->total_amount }} RWF</td>
                                                    <td>{{ $loan->status }} </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
</div>
@endsection