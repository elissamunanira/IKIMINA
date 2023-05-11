@extends('dashboard.app')

@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome to Saving Management Field</span></h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dash">Dashboard</a></li>
                                <li class="breadcrumb-item active">Savings</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <section id="main-content">
                
                <a class="btn btn-primary" href="/saving/create">+Saving</a>
                <div class="card">
                    <div class="bootstrap-data-table-panel">
                        <div class="table-responsive">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Members Name</th>
                                    <th>Total savings</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user) 
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{ $user->firstname }} {{ $user->lastname }}</td> 
                                    <td>{{ $user->savings->sum('amount')}} RWF</td>
                                    <td><a class="btn btn-success" href="{{ url('savings',$user->id) }}">View</a></td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection