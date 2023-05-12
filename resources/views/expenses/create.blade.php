@extends('dashboard.app')
@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Expenses</h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dash">Dashboard</a></li>
                                <li class="breadcrumb-item active">Expenses</li>
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
                        <center><h4>Create Expense</h4></center>
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
                                       

                                        <form action="{{ route('budget_lines.expenses.store', $budgetLine->id) }}" method="POST">
                                            @csrf



                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="name">Name:</label>
                                                <div class="col-lg-6">
                                                <input class="form-control" type="text" name="expense_name" id="name" required> 
                                                </div> 
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="expense_amount">Amount used: </label>
                                                <div class="col-lg-6">
                                                <input class="form-control" type="number" name="expense_amount" id="expense_amount" required> 
                                                </div> 
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="expense_date">Date</label>
                                                <div class="col-lg-6">
                                                <input class="form-control" type="text" name="expense_date" id="expense_date" required> 
                                                </div> 
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="expense_description">Description</label>
                                                <div class="col-lg-6">
                                                <input class="form-control" type="text" name="expense_description" id="expense_description" required> 
                                                </div> 
                                            </div>

                                            <input class="btn btn-primary" type="submit" value="Create">
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