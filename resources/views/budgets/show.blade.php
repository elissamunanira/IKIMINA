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
                        <a class="btn btn-primary" href="{{ route('budgets.create') }}">+New </a>
                        <div class="card">
                            <div class="card-body">
                            <h2>Budgets</h2>
                                <ul>
                                    <li>
                                        Budget Name: {{$budget->budget_name}}
                                    </li>
                                    <li>
                                        Amount to be Used: {{$budget->budget_amount}} RWF
                                    </li>
                                </ul>

                            <a href="{{ route('budgets.budgetlines.create', $budget) }}">Create Budget Line</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection






