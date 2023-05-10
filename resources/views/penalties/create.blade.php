@extends('dashboard.app')
@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Add New Penalty</h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dash">Dashboard</a></li>
                                <li class="breadcrumb-item active">Peanlty</li>
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
                                       <form method="POST" action="{{ route('penalties.store') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="member_id">Member ID:</label>
                                            <input type="text" class="form-control" id="member_id" name="member_id" value="{{ old('member_id') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="rule_id">Rule:</label>
                                            <select class="form-control" id="rule_id" name="rule_id" required>
                                                @foreach ($rules as $rule)
                                                    <option value="{{ $rule->id }}">{{ $rule->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description:</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="amount">Amount:</label>
                                            <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount') }}" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Create Penalty</button>
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






