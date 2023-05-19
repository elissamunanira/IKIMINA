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
                                <h1>{{ $budgetLine->name }}</h1>
                                    <p>Amount: ${{ $budgetLine->amount }}</p>
                                    <p>Budget: {{ $budgetLine->budget->name }}</p>
                                    <p>Budget Description: {{ $budgetLine->budget->description }}</p>

                                    <a href="{{ route('budgets.budgetlines.edit', ['budget' => $budgetLine->budget, 'budgetline' => $budgetLine]) }}">Edit</a>

                                    <form action="{{ route('budgets.budgetlines.destroy', ['budget' => $budgetLine->budget, 'budgetline' => $budgetLine]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this budget line?')">Delete</button>
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






