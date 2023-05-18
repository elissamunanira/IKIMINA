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
                                <h1>Budget Lines for {{ $budget->name }}</h1>

                                @if ($budgetLines->isEmpty())
                                    <p>No budget lines found.</p>
                                @else
                                    <ul>
                                        @foreach ($budgetLines as $budgetLine)
                                            <li>
                                                <a href="{{ route('budgets.budgetlines.show', ['budget' => $budget, 'budgetline' => $budgetLine]) }}">
                                                    {{ $budgetLine->name }} - ${{ $budgetLine->amount }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

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






