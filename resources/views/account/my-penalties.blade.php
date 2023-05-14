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
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dash">Dashboard</a></li>
                                <li class="breadcrumb-item active">My Account</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <section id="main-content">
                <div class="row"> 
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <center><h4 class="card-title"><strong>penaltys</strong></h4></center> 
                                   
                                
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Rule Destroyed</th>
                                                <th>Date Destroyed</th>
                                                <th>Amount to pay</th>
                                                <th>Description</th>
                                                <th>status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($penalties as $penalty)
                                                <tr>
                                                    <td>{{++$i}}</td>
                                                    <td>{{ $penalty->rule->name }}</td>
                                                    <td>{{ $penalty->created_at }}</td>
                                                    <td>{{ $penalty->amount }} RWF</td>
                                                    <td>{{ $penalty->description }}</td>
                                                    <td> 
                                                        @if($penalty->paid == 0)
                                                            <span class="badge rounded-pill bg-warning">NOT PAID</span>
                                                        @else
                                                            <span class="badge rounded-pill bg-success">PAID</span>
                                                        @endif
                                                    </td>
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