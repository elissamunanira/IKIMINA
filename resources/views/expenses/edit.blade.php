@extends('dashboard.app')
@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Expenses Editing Field</h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dash">Dashboard</a></li>
                                <li class="breadcrumb-item active">Expense</li>
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
                                       
                                        <form action="{{ route('budget_lines.expenses.update', [$budgetLine->id, $expense->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                         <div>
                                            <label for="expense_name">Name:</label>
                                            <input type="text" name="expense_name" id="expense_name" value="{{ $expense->expense_name }}" required>
                                        </div>

                                        <div>
                                            <label for="description">Description:</label>
                                            <input type="text" name="description" id="description" value="{{ $expense->description }}" required>
                                        </div>

                                        <div>
                                            <label for="expense_amount">Amount:</label>
                                            <input type="number" name="expense_amount" id="expense_amount" value="{{ $expense->expense_amount }}" required>
                                        </div>

                                        <button type="submit">Update Expense</button>
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