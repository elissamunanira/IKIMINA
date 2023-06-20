@extends('dashboard.app')
@section('content')


<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome to Saving Management Field</span></h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dash">Dashboard</a></li>
                                <li class="breadcrumb-item active">Savings</li>
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
                    <center><h4 class="card-title"><strong>Add New Mituelle record</strong></h4></center>
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
                                        <form method="POST" action="{{ route('mituelle.store') }}">
                                            @csrf
                                            <div class="form-group col-lg-8">
                                                <label for="user_id">Member<span class="text-danger">*</span></label>
                                                <select name="user_id" class="form-control">
                                                    <option value="">--- Select Member ---</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->firstname }} {{ $user->lastname }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-8">
                                                <label for="amount">Amount<span class="text-danger">*</span></label>
                                                <input type="number" name="mituelle_amount" class="form-control" required>
                                            </div>
                                            <div class="form-group col-lg-8">
                                                <label for="month">Month<span class="text-danger">*</span></label>
                                                <input type="date" name="mituelle_month" class="form-control" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
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