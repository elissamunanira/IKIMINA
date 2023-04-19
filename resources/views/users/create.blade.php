@extends('dashboard.app')
@section('content')
{{-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}
<p class="text-center text-primary"><small>Tutorial by LaravelTuts.com</small></p>
 --}}

 
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Add New Member</h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dash">Dashboard</a></li>
                                <li class="breadcrumb-item active">User</li>
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


                                    {{-- <form class="form-valide" action="/users" method="post"> --}}
                                        {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                                       @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">First Name <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter a firstname..">

                                                @if($errors->has('firstname'))
                                                <span class="text-danger">
                                                {{$errors->first('firstname')}}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
       
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="lastname">Last Name <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter a Lastname..">
 
                                                @if($errors->has('lastname'))
                                                <span class="text-danger">
                                                {{$errors->first('lastname')}}
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-select2">Gender <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <select class="js-select2 form-control" id="name" name="gender" style="width: 100%;" data-placeholder="Choose one..">
                                                    <option>-- please select your gender --</option>
                                                    <option name="gender" value="MALE">MALE</option>
                                                    <option name="gender" value="FEMALE">FEMALE</option>
                                                    <option name="gender" value="OTHER">OTHER</option>
                                                </select>

                                                @if($errors->has('gender'))
                                                <span class="text-danger">
                                                  {{$errors->first('gender')}}
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="telephone">Phone<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="+250-788-565-520">

                                                @if($errors->has('telephone'))
                                                <span class="text-danger">
                                                {{$errors->first('telephone')}}
                                                </span>
                                                @endif
                                            </div>
    
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="email">Email <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Your valid email..">
                                                @if($errors->has('email'))
                                                <span class="text-danger">
                                                  {{$errors->first('email')}}
                                                </span>
                                                @endif
                                            </div>

                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Password <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <input type="password" class="form-control" id="val-password" name="password" placeholder="Choose a safe one..">

                                                @if($errors->has('password'))
                                                <span class="text-danger">
                                                    {{$errors->first('password')}}
                                                </span>
                                                @endif
                                            </div>
    
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Confirm Password <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <input type="password" class="form-control" id="val-confirm-password" name="confirm-password" placeholder="..and confirm it!">
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-select2">Role <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <select class="js-select2 form-control" id="val-select2" name="roles" style="width: 100%;" data-placeholder="Choose one..">
                                                    <option disable selected>--Select Role--</option>
                                                        @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>  
                                                        @endforeach
                                                    </select>
                                            </div>
                                        </div> --}}
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

@endsection