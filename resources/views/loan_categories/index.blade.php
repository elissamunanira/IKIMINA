@extends('dashboard.app')
@section('content')	


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>Welcome to Loan Categories Field</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dash">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Loan categories</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>


                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <a class="btn btn-primary" href="/loan-categories/create"> Create New Loan Category</a>
                        </div>
                    </div>
                </div>


                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Interest_rate</th>
                                                    <th>Period/Duration</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($loanCategories as $loanCategory)
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $loanCategory->name }}</td>
                                                        <td>{{ $loanCategory->interest_rate }}</td>
                                                        <td>{{ $loanCategory->duration}} Months</td>
                                                        <td><a href="{{ route('loan_categories.edit',$loanCategory->id) }}">Action</td>
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





