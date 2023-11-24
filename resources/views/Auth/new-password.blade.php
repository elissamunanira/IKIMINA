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
                    <p>Please create new password</p>
                    <div class="row">
                        <div class="col-md-6 mb-4 pb-2">
              
                          <div class="form-outline">
                            <input type="password" name="password" class="form-control form-cont" />
                            <label class="form-label"for="password" >Password</label>
                          </div>
              
                          @if($errors->has('password'))
                          <span class="text-danger">
                            {{$errors->first('password')}}
                          </span>
                          @endif
              
                        </div>
                        <div class="col-md-6 mb-4 pb-2">
              
                          <div class="form-outline">
                            <input type="password" name="password_confirmation" class="form-control form-cont" />
                            <label class="form-label" for="password" >Confirm Password</label>
                          </div>
              
                        </div>
                      </div>
               </div>
     
               </div>
               
             </div>
             <input class="btn btn-primary " type="submit" value="Submit" />
     </form>

@endsection