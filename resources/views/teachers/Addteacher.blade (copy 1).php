
@extends('layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>AddUser</title>

    <style>
        body
    {
    font-family: 'Poppins',sans-serif;
    font-size: 14px;
    background-color: #eee;
    color: #666;
    }
    .login-container
    {
    height: 70vh;
    display: flex;
    width: 100%;
    }
    .login-form
    {
    max-width: 100%;
    margin: auto;
    width: 770px;
    padding: 15px;
    }
    .form-control
    {
    font-size: 15px;
    min-height: 48px;
    font-weight: 500;
    }
    .form-control:focus
    {
    border-color: #0d6efd;
    box-shadow: 0 0 0.2rem rgba(114, 61, 190, .25);
    }
    .login-form a
    {
    text-decoration: none;
    color: #666;
    }
    .login-form a:hover
    {
    color: #0d6efd;
    }
    .btn-custom
    {
    background: #0d6efd;
    border-color: #0d6efd;
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    min-height: 48px;
    }

    .btn-custom:focus,
    .btn-custom:hover,
    .btn-custom:active,
    .btn-custom:active:focus
    {
    background: #0d6efd;
    border-color: #0d6efd;
    color: #fff;
    }
   
    </style>

</head>
<body>
  <div class="login-container d-flex align-items-center justify-content-center">
    <center>
        <form action="{{route('addteacher')}}" class="login-form text-center" method="POST" enctype="multipart/form-data">
        @csrf
        <br><br><br><br><br>
        <h1 class="mb-5 font weight -light text-uppercase">Add Teacher Credentials</h1>
        <div class="form-group ">
            Firstname:<input type="text" class="form-control rounded-pill form-control-lg" placeholder="Enter firstname" name="firstname"  required>
      </div>
      <div class="form-group ">
        Lastname:<input type="text" class="form-control rounded-pill form-control-lg" placeholder="Enter lastname" name="lastname" required>
     </div>
      <div class="form-group ">
        Phone:<input type="text" class="form-control rounded-pill form-control-lg" placeholder="Enter  valid phone number" name="phone" required>
      </div>
        <div class="form-group ">
             Email: <input type="email" class="form-control rounded-pill form-control-lg" placeholder="Enter  valid email" name="email" required>
        </div>
        <div class="form-group">
            About:<textarea name="about"  cols="30" rows="3" class="form-control rounded-pill form-control-lg" placeholder="Enter description of teacher" re></textarea>
       </div>
       <div class="form-group">
           Image: <input type="file" class="form-control rounded-pill form-control-lg" placeholder="choose file" name="file"  >
      </div>
      <button type="submit" class="btn mt-5 btn-custom btn-primary btn-block text-uppercase rounded-pill btn-lg">Add</button>
    </form>
    </center>
  </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>






@endsection