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
                <p class="slog">Edit Your Developer</p>
            
                {{-- {{ route('admin.dev.edit', ['dev_id' => $devloper?->dev_id]) }} --}}
                <form action="" method="post" >
                    @csrf    
                    {{-- Server Ip --}}
                    <p> Server IP </p>
                    <input type="text" class="form-control" name="serverip" placeholder="Enter New ServerIP" value=" ">
                    
                    {{-- Email --}}
                    <p> Email </p>
                    <input type="email" class="form-control" name="email" placeholder="Enter New Email" value="">
                    

                    {{-- Access Log Key --}}
                    <p> LogAccessKey </p>
                    <input type="text" class="form-control" name="logaccesskey" placeholder="Enter New LogAccessKey" value="">
       
                    
                    {{-- Project name --}}
                    <p> ProjectName </p>
                    <input type="text" class="form-control" name="projectname" placeholder="Enter New ProjectName" value="">

                    
                    {{-- Repo link --}}
                    <p> RepoLink </p>
                    <input type="text" class="form-control" name="repolink" placeholder="Enter New repolink" value="">
                   
                    <input class="dlBtn" type="submit"  value="Update">
                </form>
              
            </div>



        </div>
    </div>

    <p class="headBef">Customize your <strong style="color:#f8a530;text-transform:uppercase;"> Developers</strong> below</p>
    <div class="addDelBtns">
        <a class="green" href={{ route('admin.dev.signup') }}>Add Developer</a>
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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            

        

                @foreach($devlopers  as $devloper)
                <tr >
                    <td>{{ $devloper ->name }} </td>
                    <td> {{ $devloper->email }} </td>
                    <td> {{ $devloper->username }}</td>
                    <td> {{ $devloper->projectname }} </td>
                    <td> {{ $devloper->serverip }} </td>
                    <td>
     
                    <!--  Onclick to the button itgoes to an event whih is js public myModels -->

                    <button class="editBtn"  onclick="editRecord(event)">
                           
                        <i 
                            id={{$devloper->dev_id}} 
                            name={{$devloper->name}}  
                            email={{$devloper->email}} 
                            repolink={{$devloper->repolink}}
                            logaccesskey={{$devloper->logaccesskey}}
                            username={{$devloper->username}} 
                            projectname={{$devloper->projectname}} 
                            serverip={{$devloper->serverip}} 
                            class="material-icons" data-toggle="tooltip" title="Edit">
                            &#xE254;
                        </i>
                    </button>
                    
                    <a href="{{ route('admin.dev.delete' , ['dev_id' => $devloper->dev_id]) }}" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    
                </td>
                </tr>


  
                @endforeach
            </tbody>
            
        </table>
    </div>

  
@endsection