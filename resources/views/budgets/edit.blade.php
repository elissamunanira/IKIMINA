@extends('dashboard.app')
@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Budget Editing Field</h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dash">Dashboard</a></li>
                                <li class="breadcrumb-item active">Budget</li>
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
                                       
                                        <form method="POST" action="{{ route('budgets.update', $budget->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="name">Name:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="budget_name" id="name" value="{{ $budget->budget_name }}" required>
                                                </div> 
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="start_date">Start Date:</label>
                                                <div class="col-lg-6">
                                                    <input type="date" name="start_date" id="start_date" value="{{ $budget->start_date }}" required>
                                                </div> 
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="end_date">End Date:</label>
                                                <div class="col-lg-6">
                                                    <input type="date" name="end_date" id="end_date" value="{{ $budget->end_date }}" required>
                                                </div> 
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="amount">Amount:</label>
                                                <div class="col-lg-6">
                                                    <input type="number" name="budget_amount" id="amount" step="0.01" value="{{ $budget->budget_amount }}" required>
                                                </div> 
                                            </div>

                                            <input class="btn btn-primary" type="submit" value="Update">
                                        </form>

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