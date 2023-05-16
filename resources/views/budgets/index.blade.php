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
                                <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                      <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Amount</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($budgets as $budget)
                                                <tr>
                                                    <td>{{ $budget->action_name }}</td>
                                                    <td>{{ $budget->start_date }}</td>
                                                    <td>{{ $budget->end_date }}</td>
                                                    <td>{{ $budget->budget_amount }}</td>
                                                    <td>
                                                        <a href="{{ route('budgets.edit', $budget->id) }}">Edit</a>
                                                        <form method="POST" action="{{ route('budgets.destroy', $budget->id) }}" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this budget?')">Delete</button>
                                                        </form>
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






