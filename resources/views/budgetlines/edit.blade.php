@extends('dashboard.app')
@section('content')


<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome to Budgetlines Management Field</span></h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dash">Dashboard</a></li>
                                <li class="breadcrumb-item active">Budgetlines</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="container">
                        <h1>Edit Budget Line</h1>

                        <form action="{{ route('budgets.budgetlines.update', ['budget' => $budgetLine->budget->id, 'budgetLine' => $budgetLine->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Budget Line Name</label>
                                <input type="text" name="budget_line_name" id="name" class="form-control" value="{{ $budgetLine->budget_line_name }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" step="0.01" name="budget_line_amount " id="amount" class="form-control" value="{{ $budgetLine->budget_line_amount }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Budget Line</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection