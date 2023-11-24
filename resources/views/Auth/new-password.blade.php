@extends('Auth.app')
@section('content')

    @if(Session::get('Success'))
    <div class="alert alert-success">
    {{Session::get('Success')}}
    @php 
    Session::forget('Success')
    @endphp
    </div>
    @endif

     <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Reseting Password</h3>
     <form action="{{route('forget.password.post')}}" method="POST">
          @csrf
          
          <div class="row">
            <div class="col-md-12 mb-4 pb-2">
                 <p>Please fill out the form to reset your password</p>
              <div class="form-outline">
                <input type="email" name="email" class="form-control form-control-lg" />
                <label class="form-label" for="password">New Password</label>
              </div>
  
              @if($errors->has('email'))
              <span class="text-danger">
                {{$errors->first('email')}}
              </span>
              @endif
  
            </div>
            
          </div>
          <input class="btn btn-primary " type="submit" value="Submit" />
     </form>

@endsection