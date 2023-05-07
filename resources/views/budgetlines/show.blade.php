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
                                <h1>{{ $budgetLine->budget_line_name }}</h1>
                                    <p>Amount To Be Used: {{ $budgetLine->budget_line_amount }} RWF</p>
                                    <p>Budget: {{ $budget->budget_name }}</p>
                                    <p>Budget Line Description: {{ $budgetLine->budget_line_description }}</p>


                                    <a class = "btn btn-primary" href="/budgets/{{$budget->id}}/budgetlines/{{$budgetLine->id}}/edit">Edit</a>

                                    <form action="{{ route('budgets.budgetlines.destroy', ['budget' => $budgetLine->budget, 'budgetLine' => $budgetLine]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger pull-right" type="submit" onclick="return confirm('Are you sure you want to delete this budget line?')">Delete</button>
                                    </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection






