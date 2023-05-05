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

                                    @if(Session::get('Success'))
                                        <div class="alert alert-success">
                                            {{Session::get('Success')}}
                                            @php 
                                            Session::forget('Success')
                                            @endphp
                                        </div>
                                        @endif
                                        <form action="{{ route('loan_categories.store') }}" method="POST">
                                            @csrf
                                            
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" id="name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="principal">Principal</label>
                                                <input type="number" name="principal" id="principal"placeholder="Set max amount to borrow" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="interest_rate">Interest Rate</label>
                                                <input type="number" name="interest_rate" id="interest_rate" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="duration">Duration</label>
                                                <input type="number" name="duration" id="duration" placeholder="Set duration/period in months"class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

@endsection






