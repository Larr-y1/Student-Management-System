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
   
    <div class="container pt-5">
        <div class="row ">    
            
            <h2>Course Credentials</h2> <br>
             <br> <br>          
                <table id="example" style="width:90%;" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Course</th>
                            <th>Course id</th>
                            <th>Description</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                       <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->course}}</td>
                        <td>{{$item->course_code}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <a href="#" class="link-dark" ><i class="bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#add{{ $item->id}}"></i></a>&nbsp;


                            <form id="delete-form-{{$item->id}}" action="{{route('course.delete',$item->id)}}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                               </form>
                               <a href="#" class="link-dark" onclick="event.preventDefault();document.getElementById('delete-form-{{$item->id}}').submit();"><i class="bi bi-trash-fill"></i></a>
                          
                        </td>
                       </tr>
  <!-- Modal -->
  <div class="modal fade" id="add{{ $item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Update Student Credentials</b></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form action="{{ route('course.update',$item->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Course</label>
                    <input type="text" class="form-control" id="" name="course" value="{{$item->course}}" >
                  </div>
                 
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Course code</label>
                    <input type="text" class="form-control" id="" name="id" value="{{$item->course_code}}">
                  </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Description</label>
                  <textarea cols="30" rows="3" type="text" class="form-control" id="" name="description" >{{$item->description}}</textarea>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
              </form>

        </div>
      </div>
    </div>
  </div>

                        @endforeach
                      
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Course</th>
                            <th>Course id</th>
                            <th>Description</th>
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