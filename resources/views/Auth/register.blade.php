@extends('Auth.app')
@section('content')
  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>



    @if(Session::get('Success'))
    <div class="alert alert-success">
      {{Session::get('Success')}}
      @php 
      Session::forget('Success')
      @endphp
    </div>
    @endif



    <form  action="{{url('/register')}}" method="post">
      @csrf

      <div class="row">
        <div class="col-md-6 mb-4">

          <div class="form-outline">
            <input type="text" name="firstname" class="form-control form-control" />
            <label class="form-label" for="firstname">First Name</label>
          </div>

          @if($errors->has('firstname'))
          <span class="text-danger">
            {{$errors->first('firstname')}}
          </span>
          @endif

        </div>
        <div class="col-md-6 mb-4">

          <div class="form-outline">
            <input type="text" name="lastname" class="form-control form-cont" />
            <label class="form-label" for="lastName">Last Name</label>
          </div>

          @if($errors->has('lastname'))
          <span class="text-danger">
            {{$errors->first('lastname')}}
          </span>
          @endif

        </div>
      </div>

      <div class="row">
        {{-- <div class="col-md-6 mb-4 d-flex align-items-center">

          <div class="form-outline datepicker w-100">
            <input type="text" class="form-control form-cont" name="birthdayDate" />
            <label for="birthdayDate" class="form-label">Birthday</label>
          </div>

        </div> --}}
        <div class="col-md-12 mb-4">

          <h6 class="mb-2 pb-1">Gender: </h6>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="femaleGender"
              value="FEMALE" />
            <label class="form-check-label" for="femaleGender">Female</label>

          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="maleGender"
              value="MALE" />
            <label class="form-check-label" for="maleGender">Male</label>

            
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="otherGender"
              value="OTHER" />
            <label class="form-check-label" for="otherGender">Other</label>
          </div>


          @if($errors->has('gender'))
          <span class="text-danger">
            {{$errors->first('gender')}}
          </span>
          @endif



        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-4 pb-2">

          <div class="form-outline">
            <input type="email" name="email" class="form-control form-cont" />
            <label class="form-label" for="emailAddress">Email</label>
          </div>

          @if($errors->has('email'))
          <span class="text-danger">
            {{$errors->first('email')}}
          </span>
          @endif

        </div>
        <div class="col-md-6 mb-4 pb-2">

          <div class="form-outline">
            <input type="tel" name="telephone" class="form-control form-cont" />
            <label class="form-label" for="phoneNumber">Phone Number</label>
          </div>

          @if($errors->has('telephone'))
          <span class="text-danger">
            {{$errors->first('telephone')}}
          </span>
          @endif

        </div>
      </div>
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

      {{-- <div class="row">
        <div class="col-12">

          <select class="select form-cont">
            <option value="1" disabled>Choose option</option>
            <option value="2">Subject 1</option>
            <option value="3">Subject 2</option>
            <option value="4">Subject 3</option>
          </select>
          <label class="form-label select-label">Choose option</label>

        </div>
      </div>
  --}}
      <div class="mt-4 pt-2">
        <input class="btn btn-primary " type="submit" value="Submit" />
      </div>
        <p>If you already have account please <a href="/login">Login</a></p>

    </form>
@endsection