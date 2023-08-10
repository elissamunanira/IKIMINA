@extends('dashboard.app')
@section('content')


<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome to mituelle Management Field</span></h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dash">Dashboard</a></li>
                                <li class="breadcrumb-item active">mituelles</li>
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
                        <form method="POST" action="{{ route('mituelles.update',$mituelle->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="user_id">Member<span class="text-danger">*</span></label>
                                <select name="user_id" class="form-control">
                                    <option value="">--- Select Member ---</option>
                                   @foreach($users as $userId => $userName)
                                        <option value="{{ $userId }}" {{ $mituelle->user_id == $userId ? 'selected' : '' }}>{{ $userName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount<span class="text-danger">*</span></label>
                                <input type="number" name="mituelle_amount" class="form-control" value = "{{ $mituelle->mituelle_amount }}">
                            </div>
                            <div class="form-group">
                                <label for="month">Month<span class="text-danger">*</span></label>
                                <input type="date" name="mituelle_month" class="form-control" value = "{{ $mituelle->mituelle_month }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection