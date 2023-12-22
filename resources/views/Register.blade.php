<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Registration Form</title>
</head>
<body style=" font-family: 'Poppins',sans-serif;
font-size: 14px;
background-color: #eee;
color: #666;">
    
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5"><h3>STUDENT REGISTRATION FORM  </h3></nav>
    
    <div class="container">
        <div class="text-center mb-4" style="background-color: #adb5bd">
            <h3>Basic information</h3>
        </div>
        <center><p class="text-muted">Please complete the form below to be registered</p></center>
           <br>
        <div class="container d-flex justifycontent-center">
         <form action="" method="POST" style="width: 50vw; min-width:300px;">
            @csrf
            <form>
              <center>
                <div class="form-row">
                    <div class="col">
                        <label for=>Firstname:</label>
                      <input type="text" class="form-control" placeholder="Larry" name="firstname" value="{{old('firstname')}}">
                      <span class="text-danger">@error('firstname') {{$message}}@enderror</span>
                    </div>
                    <div class="col">
                        <label for=>Lastname:</label>
                      <input type="text" class="form-control" placeholder="Otieno" name="lastname" value="{{old('lastname')}}">
                      <span class="text-danger">@error('lastname') {{$message}}@enderror</span>

                    </div>
                  </div>
                <br>
                
                    <div class="form-group ">
                      <label >Contact Number:</label>
                      <input type="number" class="form-control"  placeholder="07xxxxxx90" name="phone" value="{{old('phone')}}">
                      <span class="text-danger">@error('phone') {{$message}}@enderror</span>

                    </div>
                   
                  
                  <div class="form-group">
                    <label for>Email:</label>
                    <input type="text" class="form-control"  placeholder="name@examplegmail.com" name="email" value="{{old('email')}}">
                    <span class="text-danger">@error('email') {{$message}}@enderror</span>

                  </div>
                  <div class="form-group">
                    <label >Password</label>
                    <input type="text" class="form-control"  placeholder='Enter Valid Password' name="password" value="{{old('password')}}">
                    <span class="text-danger">@error('password') {{$message}}@enderror</span>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Date of Birth</label>
                      <input type="date" class="form-control" name="date"  value="value="{{old('date')}}>
                      <span class="text-danger">@error('date') {{$message}}@enderror</span>

                    </div>
                    
                   
                  </div>
                  <div class="form-row">
                  <div class="form-group ">
                            <label >Gender: </label>
                            <label class="form-check-label" for="male">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                            <label class="form-check-label" >Female </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check-input" type="radio" name="gender"  id="male" value="female">
                            <span class="text-danger">@error('gender') {{$message}}@enderror</span>

                          
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Sign Up</button>
                  <a href="/">Back</a>
                  <p class="mt-3 font-weight-normal">Do you have an account <a href="/login"><strong>Login Now</strong></a></p>
                
              
         </form>
         </center>
        </div>

    </div>
    <script>
        // Check if a session flash message is set
        @if(session()->has('success'))
            // Display a pop-up message using JavaScript
            alert("{{ session('success') }}");
        @endif
    </script>

    <!--Bootsrtap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<body>

</body>
</html>