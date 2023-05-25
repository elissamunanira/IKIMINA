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

                    <!-- /# row -->
                    <div class="card">
                        
                        <h2>Overall Summary</h2>
                        <p>Total Budgeted Amount: {{ $totalBudgetedAmount }} RWF</p>
                        <p>Total Actual Expenses: {{ $totalActualExpenses }} RWF</p>
                        <p>Overall Variance: {{ $overallVariance }} RWF</p>
                    </div>

                    <div class="card"></div>

                    <!-- /# row -->
                    <div class="card">
                        <h2>Budget Comparison</h2>

                            {{-- <p>Allocated Amount: ${{ $allocatedAmount }}</p>
                            <p>Total Expenses: ${{ $totalExpenses }}</p>

                            @if ($comparisonResult == 0)
                                <p>Budget is balanced.</p>
                            @elseif ($comparisonResult == -1)
                                <p>Budget is under-spent.</p>
                            @else
                                <p>Budget is over-spent.</p>
                            @endif --}}
                    </div>
                    <div class="col-lg-12">
                        <center><h4>Budget vs Expenses Comparison</h4></center>
                        <div class="card">
                            <div class="card-body">
                                <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Budget Line</th>
                                            <th>Budgeted Amount</th>
                                            <th>Actual Expenses</th>
                                            <th>Variance</th>
                                            <th>Percentage</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($budgetLines as $budgetLine)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $budgetLine->budget_line_name }}</td>
                                                <td>{{ $budgetLine->budget_line_amount }} RWF</td>
                                                <td>{{ $budgetLine->expenses()->sum('expense_amount') }} RWF</td>
                                                <td>{{ $budgetLine->variance }} RWF</td>
                                                <td>{{ $budgetLine->percentage }}%</td>
                                                <td>
                                                    <div class="dropdown text-sans-serif"><i class="tp-btn-light sharp" type="button" id="order-dropdown-0" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></i>
                                                    <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="order-dropdown-0">


                                                    <a class="dropdown-item" href="/budget_lines/{{$budgetLine->id}}/expenses">Show/View</a>

                                                    {{-- <a class="dropdown-item" href="/budget_lines/{{$budgetLine->id}}/expenses">Expenses</a> --}}

                                                    {{-- <form method="POST" action="{{ route('budgets.destroy', $budget->id) }}" style="display: inline;">

                                                        @csrf
                                                        @method('DELETE')
                                                        <button class = "btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this budget?')">Delete</button>
                                                    </form> --}}
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
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
