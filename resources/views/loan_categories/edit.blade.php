@extends('dashboard.app')
@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Add New category</h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dash">Dashboard</a></li>
                                <li class="breadcrumb-item active">Loan Categories</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form method="POST" action="/loan-categories/{{ $loanCategory->id }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $loanCategory->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="principal">principal</label>
                                            <input type="text" class="form-control" id="principal" name="principal" value="{{ $loanCategory->principal }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="interest_rate">Interest_rate</label>
                                            <input type="text" class="form-control" id="interest_rate" name="interest_rate" value="{{ $loanCategory->interest_rate }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="period">Duration/Period</label>
                                            <input type="text" class="form-control" id="duration" name="duration" value="{{ $loanCategory->duration }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
@endsection