@extends('Auth.app')
@section('content')

     <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Forget Password</h3>
     <form action="{{route('forget.password.post')}}" method="POST">
     </form>

@endsection