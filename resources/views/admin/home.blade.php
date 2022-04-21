@extends('layouts.admin.dashboard.main')

@section('title',"Admin Dashboard")

@section('name',$LoggedAdminData['name'])

@section('teamkey',$LoggedAdminData['teamkey'])

@section('email',$LoggedAdminData['email'])

@section('disc',$LoggedAdminData['discription'])

@section('content') 

    <div class="modalContent">
        <div class="modalArea">
            <div class="modalButtons">
                <button class="close" onclick="closeModal()">
                    <i class="material-icons">close</i>
                </button>
                <span id="pathName"></span>
            </div>

            <div class="modalInfo">
                <p class="slog">Delete Your Developer</p>
                <form action="{{ route('admin.dev.deletebyUsername') }}" method="post">
                    @csrf    
                    <input type="text" class="form-control" name="username" placeholder="Enter Dev Username">
                    <p class="slog2">Are you sure you want to delete this record ?Deleted Items would not revert</p>
                    <input class="dlBtn" type="submit"  value="Delete">
                </form>
            </div>

            {{-- Edit Record --}}
            <div class="modalInfo modalInfo2">
                <p class="slog">Delete Your Developer</p>
                @if($devloper??"")
                <form action="{{ route('admin.dev.edit', ['dev_id' => $devloper->dev_id]) }}" method="post">
                    @csrf    
                    {{-- Server Ip --}}
                    <input type="text" class="form-control" name="serverip" placeholder="Enter New ServerIP" value="{{ old('jobid') }}">
                    
                    {{-- Email --}}
                    <input type="text" class="form-control" name="email" placeholder="Enter New Email" value="{{ old('email') }}">
                    

                    {{-- Access Log Key --}}
                    <input type="text" class="form-control" name="logaccesskey" placeholder="Enter New LogAccessKey" value="{{ old('logaccesskey') }}">
       
                    {{-- Project name --}}
                    <input type="text" class="form-control" name="projectname" placeholder="Enter New ProjectName" value="{{ old('projectname') }}">

                    
                    {{-- Repo link --}}
                    <input type="text" class="form-control" name="repolink" placeholder="Enter New repolink" value="{{ old('repolink') }}">
                   
                    <input class="dlBtn" type="submit"  value="Update">
                </form>
                @endif
            </div>



        </div>
    </div>


    <div class="addDelBtns">
        <button onclick="delDeveloper()">Delete Devloper</button>
    </div>


    <div class="usersTable">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Project Name</th>
                    <th>Server IP </th>
                    <th>IP address </th>
                </tr>
            </thead>
            <tbody>
            

        

                @foreach($devlopers  as $devloper)
                <tr>
                    <td>{{ $devloper -> name }} </td>
                    <td> {{ $devloper->email }} </td>
                    <td> {{ $devloper->username }}</td>
                    <td> {{ $devloper->projectname }} </td>
                    <td> {{ $devloper->serverip }} </td>
                    <td>
                        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="{{ route('admin.dev.delete' , ['dev_id' => $devloper->dev_id]) }}" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
                </tr>


  
                @endforeach
            </tbody>
            
        </table>
    </div>

  
@endsection



{{-- 



<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
      <h2>Manage  <b>  Devlopers </b></h2>
     </div>


     <div class="col-sm-6">
     
     <a href="{{ route('admin.dev.signup') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Devloper</span></a>
       <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete Devloper By Username</span></a>      
     </div>
                </div>
            </div>
           
            <table class="table table-striped table-hover">
    
            <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th> Username </th>
                        <th>ProjectName</th>
                        <th>ServerIP</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
                <tbody>
         
                </tbody>
            </table>
   
            </div>
        </div>
    </div>


 <!-- Edit Modal HTML -->
 <div id="editEmployeeModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    
   <form action="{{ route('admin.dev.edit', ['dev_id' => $devloper->dev_id]) }}" method="post">

     <div class="modal-header">      
      <h4 class="modal-title">Edit Dev Profile</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body">     
      
     <div class="form-group">
                 <label>ServerIP</label>
              </div>
     
    
     
    </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
      <input type="submit" class="btn btn-info" value="Update">
     </div>
    </form>
   </div>
  </div>
 </div>
 <!-- Delete Modal HTML -->
 <div id="deleteEmployeeModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
   <form action="{{ route('admin.dev.deletebyUsername') }}" method="post">
   @csrf    
     <div class="modal-header">      
      <h4 class="modal-title">Delete Devloper</h4>
      
      <div class="form-group">
                 <label>UserName</label>
                 <input type="text" class="form-control" name="username" placeholder="Enter Dev Username">
              </div>

      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     
    </div>
     <div class="modal-body">     
      <p>Are you sure you want to delete these Records?</p>
      <p class="text-warning"><small>This action cannot be undone.</small></p>
     </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
      <input type="submit" class="btn btn-danger" value="Delete">
     </div>
    </form>
   </div>
  </div>
 </div>

</div> --}} 