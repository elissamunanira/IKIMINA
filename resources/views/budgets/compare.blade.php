@extends('dashboard.app')
@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 name-margin-right">
                    <div class="page-header">
                        <div class="page-name">
                            <h1>Budget</h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 name-margin-left">
                    <div class="page-header">
                        <div class="page-name">
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
                            <h1>Budget vs Expenses Comparison</h1>

                                <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Budget Line</th>
                                            <th>Budgeted Amount</th>
                                            <th>Actual Expenses</th>
                                            <th>Variance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($budgetLines as $budgetLine)
                                            <tr>
                                                <td>{{ $budgetLine->budget_line_name }}</td>
                                                <td>{{ $budgetLine->budget_line_amount }}</td>
                                                <td>{{ $budgetLine->expenses()->sum('expense_amount') }}</td>
                                                <td>{{ $budgetLine->variance }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                                </div>

                                <h2>Overall Summary</h2>
                                <p>Total Budgeted Amount: {{ $totalBudgetedAmount }}</p>
                                <p>Total Actual Expenses: {{ $totalActualExpenses }}</p>
                                <p>Overall Variance: {{ $overallVariance }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
