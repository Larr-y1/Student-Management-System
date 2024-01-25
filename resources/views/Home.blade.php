<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student management system</title>
   <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"> 
    <link rel="stylesheet" type="text/css" href="style.css"><!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 
<style type="text/css">
*
{
    padding: 0%;
    margin: 0%;
}
 


nav
{
    position: fixed;
    background-color: whitesmoke;
    height: 90px;
    width: 100%;
    z-index: 1;
}

.logo
{
    font-size: 30px;
    position: relative;
    left: 5%;
    color: black;
    font-weight: bold;
    line-height: 70px;
}

ul
{
    float: right;
    margin-right: 30px;
}
ul li
{
    display: inline-block;
    line-height: 70px;
    margin: 0 5px;
}
ul li a
{
    text-decoration: black;
    color: rgb(22, 14, 14);
    font-size: 17px;
}
.main_img
{
    width: 100%;
    height: 700px;
}
.section1
{
    padding: 3px;
}
.img_text
{
    position: absolute;
    top: 20%;
    left: 40%;
    color: rgb(160, 123, 123);
    font-size: 40px;
}
.img_text1
{
    position: absolute;
    top: 20%;
    left: 40%;
    color: rgb(160, 123, 123);
    font-size: 20px;
}
.welcome_img
{
    width: 100%;
    height: 250px;
}
.container
{
    padding-top: 70px;

}
.teacher
{
  width: 90%;
  height: 200px;
}
.admission_form
{
    display: flexbox;
    width: 100%;
    text-align: center;
    padding-right: 10px;
    
    
}
.title_ko
{
    font-family:'Times New Roman', Times, serif ;
    font-weight: bold;
}
.body_peg
{

    
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100%;
    
}
</style>

</head>
<body background="storage/lok.jpeg" class="body_peg" >
    <nav>

    <label class="logo">SaintSChools</label>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="/register">Register</a></li>
        <li><a href="/login " class="btn btn-default">Login</a></li>
    </ul>

    </nav>

    <div class="section1">

<label class="img_text"><b>Welcome to SaintSChools</b></label>
<br>


    <img  class="main_img" src="storage/pexels.webp" >

</div>


<div class="container">

    <div class="row">

    <div class="col-md-4">

      <img class="welcome_img" src="storage/juja3s.jpeg">

    </div>

<div class="col-md-8">
<h2><b>Welcome to SaintSchools</b></h2>
<p ><b>Our mission is to provide a safe, disciplined learning environment that empowers all students to develop their full potential. We feel strongly about helping to build leaders that have the ability to succeed in whatever endeavor they undertake. Winning is not always the measure of success.The administration and staff are committed to providing a challenging and supportive learning environment where all students can succeed and reach their full potential. Every member participates in cycles of continuous learning and improvement that includes establishing high expectations, goal setting, planning, action and reflection. We develop a culture of excellence that includes a robust instructional program aligned to the Common Core State Standards (CCSS) with a focus on implementing Balanced Literacy through Reading and Writing Workshop, as well as by building language, literacy and competency across all subject areas. This includes the integration of science, technology, engineering and math (STEM) into the curriculum and by establishing a strong culture and climate.
 
 To this end, we seek to develop well-rounded students who exemplify health, wellness and character development using our core schoolwide expectations and values (Be Safe, Be Respectful, Be Responsible and Be Mindful).</b></p>
  

</div>

    </div>

</div>

<center>
    <h1><b>Our Teachers</b></h1>
</center>

<div class="container">

<div class="row">

<div class="col-md-4">

<img class="teacher" src="storage/parents.jpeg" >

<P><i><b>Teachers arena schemes of work , Schemes of Work,Lesson Plans,Primary Notes,Records of Work,Secondary Notes and Exams,Primary Exams,KCSE Revision Exams.
</i></b></P>

</div>

<div class="col-md-4">

<img class="teacher" src="storage/teachers..jpeg" >

<p><i><b>Teachers are arguably the most important members of our society. They give children purpose, set them up for success as citizens of our world.
</b></i></p>

</div>

<div class="col-md-4">

<img class="teacher" src="storage/4.jpg" >

<p><i><b>A great teacher should love educating students, and one of the principal goals many teachers set for themselves is to be the best educator they can </b></i></p>

</div>

</div>

</div>
    
<center>
    <h1><i><b>Our Courses</b></i></h1>
</center>

<div class="container">

<div class="row">

<div class="col-md-4">

<img class="teacher" src="storage/web.jpeg" >

<P><h4><b>Web development</b></h4></P>

</div>

<div class="col-md-4">

<img class="teacher" src="storage/ui.jpeg" >


<p><h4><b><p>Ui/Ux Design</p></b></h4></p>


</div>

<div class="col-md-4">

<img class="teacher" src="storage/graphic.jpeg" >

<P><h4><b>Graphic Designer</b></h4></P>
 
</div>

</div>

</div>








</div>
<center><footer>
    <h6><i><b>All copyrights are reserved by sms</b></i></h6>
</footer></center>







</body>
</html>