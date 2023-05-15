@extends('dashboard.app')
@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Penalty Editing Field</h1>
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
                                       <form action="{{ route('penalties.update',  $penalty->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="member_id">Member </label>
                                            <select name="user_id" id="user_id" class="form-control">
                                                <option value="">Select a user</option>
                                                @foreach($users as $userId => $userName)
                                                    <option value="{{ $userId }}" {{ $penalty->user_id == $userId ? 'selected' : '' }}>{{ $userName }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="rule_id">Rule:</label>
                                            <select name="rule_id" id="rule_id" class="form-control">
                                                <option value="">Select a rule</option>
                                                @foreach($rules as $ruleId => $ruleName)
                                                    <option value="{{ $ruleId }}" {{ $penalty->rule_id == $ruleId ? 'selected' : '' }}>{{ $ruleName }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3"  required>{{ old('description') }}{{$penalty->description}}</textarea>
                                        </div> 

                                        <button type="submit" class="btn btn-primary">Update Penalty</button>
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