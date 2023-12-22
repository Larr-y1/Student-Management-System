
@extends('layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/alert.css')}}">
    <title>Document</title>
</head>
<body>
@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session()->has('succes'))
<script>
    alert("{{ session('succes') }}");
</script>
@endif
    <div class="container pt-5">
        <div class="row ">    
            
            <h2>Teacher Credentials</h2> <br>
             <br> <br>          
                <table id="example" style="width:90%;" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Fistname</th>
                            <th>Lastname</th>
                            <th>Course</th>
                            <th>Course id</th>
                            <th>About</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        @foreach ($item->courses as $course )
                            
                       <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->firstname}}</td>
                        <td>{{$item->lastname}}</td>
                        <td>{{$course->course}}</td>
                        <td>{{$course->course_code}}</td>
                        <td>{{$course->description}}</td>
                        
                        <td>

                            <form  action="{{route('studentcourse.delete', ['studentId' =>$item->id,'courseId'=> $course->id])}}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button class="btn cancel btn-link">Delete</button>
                               </form>


                        </td>
                       </tr>

                         
                      
                       @endforeach
                        @endforeach
                      
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Fistname</th>
                            <th>Lastname</th>
                            <th>Course</th>
                            <th>Course id</th>
                            <th>About</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
             </div>
             </center>
         </div>
    </div>









    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script >
        new DataTable('#example');
    </script>   
</body>
</html>
@endsection