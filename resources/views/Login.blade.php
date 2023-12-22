<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>LoginUser</title>
</head>
<body>
   
  <div class="login-container d-flex align-items-center justify-content-center">
    <form action="{{ route('login') }}" class="login-form text-center" method="POST">
        @csrf
        <h1 class="mb-5 font weight -light text-uppercase">Login</h1>
        @if (Session::has('error'))
        <div class="alert alert-danger">{{Session::get('error')}}</div>
      @endif
        <div class="form-group ">
              <input type="email" class="form-control rounded-pill form-control-lg" placeholder="Enter email" name="email"value="{{old('email')}}" >
              <span class="text-primary">@error('email') {{$message}}@enderror</span>
        </div>
        <div class="form-group">
            <input type="password" class="form-control rounded-pill form-control-lg" placeholder="Enter password" name="password" value="{{old('password')}}">
            <span class="text-primary">@error('password') {{$message}}@enderror</span>
      </div>
      <div class="forgot-link d-flex align-items-center justify-content-between">
           <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label for="remember">Remember password</label>
           </div>
           <a href="">Forgot password?</a>
      </div>
      <button type="submit" class="btn mt-5 btn-custom btn-primary btn-block text-uppercase rounded-pill btn-lg">Login</button>
      <p class="mt-3 font-weight-normal">Don't have an account <a href="/register"><strong>Register Now</strong></a></p>
    </form>
  </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>