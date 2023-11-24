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
        <div class="container py-5 h-80">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-6">
              <div class="card shadow-2-strong card-registration" style="border-radius: 20px;">
                <div class="card-body p-4 p-md-5" style="border-radius: 20px;background: #2B2D42; color:#fff">

                  
                @include('inc.message')
                @yield('content')

                
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>