@extends('dashboard.app')
@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Budget Editing Field</h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
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
                                <div class="form-validation">

                                    @if(Session::get('Success'))
                                        <div class="alert alert-success">
                                            {{Session::get('Success')}}
                                            @php 
                                            Session::forget('Success')
                                            @endphp
                                        </div>
                                        @endif
                                       
                                        <form method="POST" action="{{ route('budgets.update', $budget->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <label for="name">Name:</label>
                                            <input type="text" name="action_name" id="name" value="{{ $budget->action_name }}" required><br>

                                            <label for="start_date">Start Date:</label>
                                            <input type="date" name="start_date" id="start_date" value="{{ $budget->start_date }}" required><br>

                                            <label for="end_date">End Date:</label>
                                            <input type="date" name="end_date" id="end_date" value="{{ $budget->end_date }}" required><br>

                                            <label for="amount">Amount:</label>
                                            <input type="number" name="budget_amount" id="amount" step="0.01" value="{{ $budget->budget_amount }}" required><br>

                                            <input type="submit" value="Update">
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