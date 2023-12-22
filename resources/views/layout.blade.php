<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Document</title>
    <style>

      *
        
        {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body
        {
          height: 100px;
        }
              /* Style the header with a grey background and some padding */
      .header {
        overflow: hidden;
        background-color: #f1f1f1;
        padding: 20px 10px;
      }
      
      /* Style the header links */
      .header a {
        float: left;
        color: black;
        text-align: center;
        padding: 12px;
        text-decoration: none;
        font-size: 18px;
        line-height: 25px;
        border-radius: 4px;
      }
      
      /* Style the logo link (notice that we set the same value of line-height and font-size to prevent the header to increase when the font gets bigger */
      .header a.logo {
        font-size: 25px;
        font-weight: bold;
      }
      
      /* Change the background color on mouse-over */
      .header a:hover {
        background-color: #ddd;
        color: black;
      }
      
      /* Style the active/current link*/
      .header a.active {
        background-color: dodgerblue;
        color: white;
      }
      
      /* Float the link section to the right */
      .header-right {
        float: right;
      }
      
      /* Add media queries for responsiveness - when the screen is 500px wide or less, stack the links on top of each other */
      @media screen and (max-width: 500px) {
        .header a {
          float: none;
          display: block;
          text-align: left;
        }
        .header-right {
          float: none;
        }
      }
          </style>
          <style>
              /* Add a black background color to the top navigation bar */
      .topnav {
        overflow: hidden;
        background-color: #333;
      }
      
      /* Style the links inside the navigation bar */
      .topnav a {
        float: left;
        display: block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
      }
      
      /* Change the color of links on hover */
      .topnav a:hover {
        background-color: #ddd;
        color: black;
      }
      
      /* Style the "active" element to highlight the current page */
      .topnav a.active {
        background-color: #2196F3;
        color: white;
      }
      
      /* Style the search box inside the navigation bar */
      .topnav input[type=text] {
        float:left;
        padding: 5px;
        border: none;
        margin-top: 8px;
        margin-right: 20px;
        font-size: 17px;
      }
      
      /* When the screen is less than 600px wide, stack the links and the search field vertically instead of horizontally */
      @media screen and (max-width: 600px) {
        .topnav a, .topnav input[type=text] {
          float: none;
          display: block;
          text-align: left;
          width: 100%;
          margin: 0;
          padding: 14px;
        }
        }
        .topnav input[type=text] {
          border: 1px solid #ccc;
          align-items: center;
          align
        }
       
          </style>
          <style>
              /* The side navigation menu */
      .sidebar {
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: #333;
        position: fixed;
        height: 100%;
        overflow: auto;
      }
      
      /* Sidebar links */
      .sidebar a {
        display: block;
        color: white;
        padding: 16px;
        text-decoration: none;
      }
      
      /* Active/current link */
      .sidebar a.active {
        background-color: #0d6efd
        color: white;
      }
      
      /* Links on mouse-over */
      .sidebar a:hover:not(.active) {
        background-color: #555;
        color: white;
      }
      
      /* Page content. The value of the margin-left property should match the value of the sidebar's width property */
      div.content {
        margin-left: 200px;
        padding: 1px 16px;
        height: 1000px;
      }
      
      
      
          </style>
          <style>
             .sidenav a, .dropdown-btn {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 17px;
        color: white;
        display: block;
        border: none;
        background: none;
        width:100%;
        text-align: left;
        cursor: pointer;
        outline: none;
      } 
      
      /* On mouse-over */
      .sidenav a:hover, .dropdown-btn:hover {
        color: #0d6efd;
      }
      
      /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
      .dropdown-container {
        display: none;
        background-color: #262626;
        padding-left: 8px;
      }
      
          </style>
    </head>

    <div class="row">
      <div class="col-md-12">
       <div class="header">
          <a href="#" class="logo">Saints Student Management System</a>
          <div class="header-right">
           
            <a href="#/register">Hello,@admin</a>
            <a href="{{'/logout'}}"><i class="bi bi-box-arrow-in-right"></i> Logout</a>
          </div>
       </div>
       <div class="topnav">
          <a class="active" href="#home">Admin Dashboard&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
          <a href="#about"></a>
          <a href="#contact"></a>
         <center> <input type="text" placeholder="Search.."></center>
         <div class="img-case" style=" position: relative;
         float:right;
         width: 50px;
         height: 50px;">
          <img src="{{asset('storage/admin.jpeg')}}" alt="" style="position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          ">
       </div>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="col-md-3">
       <!-- The sidebar -->
       <div class="sidebar">
        <a class="active" href="#home"></a>
        <a href="/admin/home"><i class="bi bi-house-fill"></i> Dashboard</a><br><br>
        <button class="dropdown-btn"><i class="bi bi-grid-1x2-fill"></i> Applications
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="{{'/Applications/View'}}">view</a>
        
          </div><br><br>
          <button class="dropdown-btn"><i class="bi bi-people"></i>  Users
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="{{'/users/View'}}">View User</a>
        
          </div><br><br>
        <button class="dropdown-btn"><i class="bi bi-person-vcard"></i>  Students
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="{{'/student/views/'}}">View Student</a>
            
          </div><br><br>
          <button class="dropdown-btn"><i class="bi bi-person-lines-fill"></i> Teachers
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="{{'/teacher/add/'}}">Add Teacher</a>
            <a href="{{'/teachers/View'}}">view Teacher</a>
            
          </div><br><br>
          <button class="dropdown-btn"><i class="bi bi-book"></i> Courses
          </button>
          <div class="dropdown-container">
            <a href="{{'/course/add/'}}">Add Course</a>
            <a href="{{'/courses/View'}}">View course</a>
            
          </div><br><br>
          <button class="dropdown-btn"><i class="bi bi-book-half"></i> Student-Courses
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="{{'/student/course/add/'}}">Add Sudent-Course</a>
            <a href="{{'/student/course/View'}}">View Student-Course</a>
            
          </div><br><br><br>
         
        
          </div>
    </div>
      <div class="content" style="margin-left: 100px;
      padding: 1px 16px;
      height: 1000px;">

        <!-- Page content -->
        
          @yield('content')
        </div>
    </div>
  </div>





    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
    </script>
</body>
</html>