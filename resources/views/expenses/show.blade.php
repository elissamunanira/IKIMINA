@extends('dashboard.app')
@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 name-margin-right">
                    <div class="page-header">
                        <div class="page-name">
                            <h1>Expense</h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 name-margin-left">
                    <div class="page-header">
                        <div class="page-name">
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
                        <a class="btn btn-primary" href="/budget_lines/{{ $budgetLine->id }}/expenses/create">+New </a>
                        <div class="card">
                            <div class="card-body">
                            <h1>Expense Details</h1>

                            <div>
                                <p><strong>Name:</strong>
                                {{ $expense->expense_name }}</p>
                            </div>

                            <div>
                                <p><strong>Description:</strong>
                                {{ $expense->description }}</p>
                            </div>

                            <div>
                                <p><strong>Amount:</strong>
                                {{ $expense->expense_amount }}</p>
                            </div>

                            <div>
                                <strong>Budget Line:</strong>
                                <p>{{ $expense->budgetLine->name }}</p>
                            </div>

                            <a class = "btn btn-primary" href="{{ route('budget_lines.expenses.edit', [$expense->budgetLine->id, $expense->id]) }}">Edit Expense</a>

                            <form action="{{ route('budget_lines.expenses.destroy', [$expense->budgetLine->id, $expense->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger pull-right" type="submit" onclick="return confirm('Are you sure you want to delete this expense?')">Delete Expense</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
