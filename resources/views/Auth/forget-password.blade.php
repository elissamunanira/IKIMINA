@extends('Auth.app')
@section('content')

     <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Forget Password</h3>
     <form action="{{route('forget.password.post')}}" method="POST">
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
     </form>

@endsection