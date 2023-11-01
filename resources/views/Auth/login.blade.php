<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'IKIBINA') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


        
</head>
<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-6">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5" style="background: #2B2D42; color:#fff">
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
                      <p><a href="#">Forgot Password</a></p>
                    </div>
                    <div class="mt-4 pt-2">
                      <p>If you are new here please <a href="/regis">Register</a></p>
                    </div>
      
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
</body>
</html>