<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>User Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(145deg, #2c2f3f, #3e4255);
      font-family: 'Inter', sans-serif;
    }

    .card {
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.4);
      background-color: #1e1f2f;
    }

    .form-control,
    .form-check-label,
    .form-check-input {
      background-color: #2c2d3f !important;
      color: #fff !important;
      border: none;
    }

    .form-control:focus {
      box-shadow: 0 0 0 0.2rem rgba(138, 123, 255, 0.25);
    }

    ::placeholder {
      color: #bbb !important;
      opacity: 1;
    }

    .btn-purple {
      background-color: #7c5eff;
      color: #fff;
    }

    .btn-purple:hover {
      background-color: #6a4de0;
    }

    .img-section {
      background: url('image/paint.jpg') no-repeat center center;
      background-size: cover;
      color: white;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      text-shadow: 0 0 10px black;
      border-top-left-radius: 20px;
      border-bottom-left-radius: 20px;
    }

    .form-section {
      padding: 40px;
    }

    .small-link {
      color: #aaaaff;
      font-size: 0.9rem;
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
              <h2 class="mb-2">Join Our Journey</h2>
              <h5 class="mb-4">Create your account and start exploring</h5>
              <a href="#" class="btn btn-outline-light btn-sm">Back to website</a>
            </div>
          </div>

          <!-- Right Side Form -->
          <div class="col-md-6 form-section text-white">
            @if(session('error'))
            <div class="alert alert-danger">
              {{ 'session('error')' }}
            </div>
            @endif
            <h3 class="mb-4">Create an account</h3>
            <p class="small-link mb-3">Already have an account? <a href="{{ route('login') }}" class="text-decoration-none">Log in</a></p>

            <form action="{{ route('registerSave') }}" method="POST">
              @csrf

              <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Your name here..." required>
              </div>

              <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Your email here..." required>
              </div>

              <div class="mb-3">
                <input type="number" name="age" class="form-control" placeholder="Your age here..." required>
              </div>

              <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password here..." required>
              </div>

              <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm your password" required>
              </div>

              <button type="submit" class="btn btn-purple w-100 mb-3">Register</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>