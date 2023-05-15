@extends('dashboard.app')
@section('content') 
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Edit Member</h1>
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
                                        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">First Name</label>
                                            <div class="col-lg-8">
                                                {!! Form::text('firstname', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
                                            </div>
                                        </div>
       
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="lastname">Last Name  </label>
                                            <div class="col-lg-8">
                                                {!! Form::text('lastname', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-select2">Gender  </label>
                                            <div class="col-lg-8"> 
                                                <select class="js-select2 form-control" id="gender" name="gender" style="width: 100%;" data-placeholder="Choose one..">
                                                    <option disable selected>{{$user->gender}}
                                                        <option value="MALE">MALE</option>
                                                        <option value="FEMALE">FEMALE</option>
                                                        <option value="OTHER">OTHER</option> 
                                                </select> 
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="telephone">Phone </label>
                                            <div class="col-lg-6">
                                                {!! Form::text('telephone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="email">Email  </label>
                                            <div class="col-lg-8">
                                                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                            </div>

                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Password  </label>
                                            <div class="col-lg-8">
                                                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                            </div>
    
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Confirm Password  </label>
                                            <div class="col-lg-8">
                                                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Role </label>
                                            <div class="col-lg-8">
                                                 <div class="form-group"> 
                                                    {!! Form::select('roles[]',$roles,$userRole, array('class' => 'form-control','multiple')) !!}
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Status </label>
                                            <div class="col-lg-8"> 
                                                <select class="js-select2 form-control" id="status" name="status" style="width: 100%;" data-placeholder="Choose one..">
                                                    <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactive</option>
                                                    <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                                                </select> 
                                            </div>
                                        </div>  
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>




@endsection