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
                        {{-- <h3>loans records for <strong>{{ $user->firstname }} {{ $user->lastname }}</strong></h3> --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date Requested</th>
                                    <th>Amount</th>
                                    <th>Interest Rate</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loans as $loan)
                                    <tr>
                                        <td>{{ $loan->user->firstname }}</td>
                                        <td>{{ $loan->created_at }}</td>
                                        <td>{{ $loan->amount }} RWF</td>
                                        <td>{{ $loan->interest_rate }}</td>
                                        <td>{{ $loan->duration }} Months</td>
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
                                        <td> <a href="{{ route('loan.edit',$loan->id) }}">Action</a>
                                           {{-- <div class="dropdown text-sans-serif"><i class="tp-btn-light sharp" type="button" id="order-dropdown-0" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></i>
                                                <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="order-dropdown-0">  
                                                        @can('loan-approval')
                                                        <a class="dropdown-item" href="{{ route('loan.edit',$loan->id) }}">Edit</a>
                                                        @endcan 
                                                    </div>
                                                </div>
                                            </div> --}}
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