<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <style>
 
.img-section {
      background: url('image/paint.jpg') no-repeat center center;
      background-size: cover;
      min-height: 90vh;
      color: white;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      text-shadow: 0 0 10px black;
      border-top-left-radius: 20px;
      border-bottom-left-radius: 20px;
    }
    </style>
  
</head>
<body>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card d-flex flex-row">
          <!-- Left Side Image -->
          <div class="col-md-6 img-section">
            <div>
              <h2 class="mb-2">Welcome Back!</h2>
              <h5 class="mb-4">Let's log you in and continue the journey</h5>
              <a href="#" class="btn btn-outline-light btn-sm">Back to website</a>
            </div>
          </div>

          <!-- Right Side Form -->
          <div class="col-md-6 form-section text-white">
            @if (session('success'))
               <div class="alert alert-success">
                 {{ session('success') }}
             </div>
            @elseif(session('error'))
               <div class="alert alert-danger">
                 {{ session('error') }}
               </div>
            @endif

            <h3 class="mb-4">Log in to your account</h3>
            <p class="small-link mb-3">Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">Sign up</a></p>
            <form method="POST" action="{{ route('auth') }}">
            @csrf
              <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email address" />
              </div>
              <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Enter your password" />
              </div>
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">                
               
              <button type="submit" class="btn btn-purple w-100 mb-3">Log in</button>              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
