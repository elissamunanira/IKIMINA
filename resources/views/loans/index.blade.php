@extends('dashboard.app')

@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome to loan Management Field</span></h1>
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
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Date Requested</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loans as $loan)
                                    <tr>
                                        
                                        <td>{{ $loan->user->firstname }}</td>
                                        <td>{{ $loan->loan_category }}</td>
                                        <td>{{ $loan->created_at }}</td>
                                        <td>{{ $loan->total_amount }} RWF</td>
                                        <td>
                                            @if($loan->status == 'pending')
                                                <span class="badge rounded-pill bg-warning">pending</span>
                                            @elseif($loan->status == 'approved')
                                                <span class="badge rounded-pill bg-success">approved</span>
                                            @elseif($loan->status == 'rejected')
                                                <span class="badge rounded-pill bg-danger">rejected</span>
                                            @else
                                                <span class="badge rounded-pill bg-info">paid</span>
                                            @endif
                                        </td>
                                        <td> 
                                            <a href="{{ route('loan.edit',$loan->id) }}">Action</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection