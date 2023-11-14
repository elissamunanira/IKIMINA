@extends('Auth.app')
@section('content');
     <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">login</h3>



        @if(Session::get('Success'))
        <div class="alert alert-success">
        {{Session::get('Success')}}
        @php 
        Session::forget('Success')
        @endphp
        </div>
        @endif



        <form  action="{{url('/log')}}" method="post">
        @csrf

        <div class="row">
          <div class="col-md-12 mb-4 pb-2">

            <div class="form-outline">
              <input type="email" name="email" class="form-control form-control-lg" />
              <label class="form-label" for="emailAddress">Email</label>
            </div>

            @if($errors->has('email'))
            <span class="text-danger">
              {{$errors->first('email')}}
            </span>
            @endif

          </div>
          
        </div>
        <div class="row">
            <div class="col-md-12 mb-4 pb-2">

              <div class="form-outline">
                <input type="password" name="password" class="form-control form-control-lg" />
                <label class="form-label"for="password" >Password</label>
              </div>

              @if($errors->has('password'))
              <span class="text-danger">
                {{$errors->first('password')}}
              </span>
              @endif

            </div>
          </div>
        <div class="mt-4 pt-2">
          <input class="btn btn-primary " type="submit" value="Login" />
          <p><a href="/forget-password">Forgot Password</a></p>
        </div>
        <div class="mt-4 pt-2">
          <p>If you are new here please <a href="/regis">Register</a></p>
        </div>

    </form>
      
@endsection