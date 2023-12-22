@extends('layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Document</title>
    </head>
<body>
    <div class="container pt-5">
        <div class="row ">    
            
            <h2>Student Applications</h2> <br>
             <br> <br>          
                <table id="example" style="width:90%;" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Date of birh</th>
                            <th>Gender</th>
                            <th>Add</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($data as $item)
                       <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->firstname}}</td>
                        <td>{{$item->lastname}}</td>
                        <td>{{$item->contact}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->DOB}}</td>
                        <td>{{$item->gender}}</td>
                        <td>
                            
                            <a href="{{route('showadd', ['id' =>$item->id])}}" class="link-dark"><i class="bi bi-person-plus-fill"></i></a>
                            <a href="{{route('showaddstudent', ['id' =>$item->id])}}" class="link-dark"><i class="bi bi-person-add"></i></a> 
                        </td>
                        <td>
                            <a href="#" class="link-dark"><i class="bi bi-trash-fill"></i></a>
                        </td>
                       </tr>
                       @endforeach
                        
                      
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Date of birh</th>
                            <th>Gender</th>
                            <th>Add</th>
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
<script >
    new DataTable('#example');
</script>

</body>
</html>

@endsection