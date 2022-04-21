@extends('layouts.users.admin.login_signup')

@section('title',"Sign Up")

@section('name',$LoggedAdminData['name'])

@section('teamkey',$LoggedAdminData['teamkey'])

@section('email',$LoggedAdminData['email'])

@section('disc',$LoggedAdminData['discription'])

@section('content') 



<div class="formAuth">
   <h1>Create New Devloper</h1>
   <form action="{{ route('admin.dev.save') }}" method="post" method="post">
          
      @if(Session::get('success'))
         <p class="text-success">
               {{Session :: get('success')}}
         </p>
      @endif

      @if(Session::get('fail'))
         <p class="text-danger">
               {{Session :: get('fail')}}
         </p>
      @endif

      @if(Session::get('err'))
         <p class="text-danger">
               {{Session :: get('err')}}
         </p>
      @endif


      @csrf
      <div class="chooseAcc">
      


         <div class="entryInputs">
            {{-- Name --}}
            <input type="text" class="form-control" name="name" placeholder="Enter full name" value="{{ old('name') }}">
            <span class="text-danger">@error('name'){{ $message }} @enderror</span>

            {{-- Mail --}}
            <input type="text" class="form-control" name="email" placeholder="Enter Email" value="{{ old('email') }}">
            <span class="text-danger">@error('email'){{ $message }} @enderror</span>


            {{-- Desc --}}
            <textarea type="text" class="form-control" name="discOfDev" placeholder="Write Short Description About Devloper" value="{{ old('disc') }}"></textarea>
            <span class="text-danger">@error('discOfDev'){{ $message }} @enderror</span>


            {{--Username --}}
            <input type="text" class="form-control" name="username" placeholder="Enter the Username" value="{{ old('username') }}">
            <span class="text-danger">@error('username'){{ $message }} @enderror</span>


            {{-- Password --}}
            <input type="password" class="form-control" name="password" placeholder="Set the Password">
            <span class="text-danger">@error('password'){{ $message }} @enderror</span>


            {{--Server Ip  --}}
            <input type="text" class="form-control" name="serverip" placeholder="Enter the Server IP/DNS">
            <span class="text-danger">@error('serverip'){{ $message }} @enderror</span>
            

            {{-- LogAccessKey --}}
            <input type="password" class="form-control" name="logaccesskey" placeholder="Enter the Log Access Key">
            <span class="text-danger">@error('logaccesskey'){{ $message }} @enderror</span>


            {{-- Domain --}}
            <input type="text" class="form-control" name="domain" placeholder="Enter the Devloper Domain">
            <span class="text-danger">@error('domain'){{ $message }} @enderror</span>


            {{-- Project Name --}}
            <input type="text" class="form-control" name="projectname" placeholder="Enter the Project Name">
            <span class="text-danger">@error('projectname'){{ $message }} @enderror</span>


            {{--Repo--}}
            <input type="url" class="form-control" name="repolink" placeholder="Enter the Project Repo Link">
            <span class="text-danger">@error('repolink'){{ $message }} @enderror</span>


            {{-- Project Desc --}}
            <textarea type="text" class="form-control" name="discOfProject" placeholder="Write Short Description About Project" value="{{ old('disc') }}"></textarea>
            <span class="text-danger">@error('discOfProject'){{ $message }} @enderror</span>
                 
            {{-- Submit --}}
            <button type="submit" >Create New Devloper</button>
            <br>

            


         </div>
         <div class="haveAcc">
            <p>Nothing to Do Yet?</p>&nbsp;&nbsp;
            <a href="{{ route('admin.dashboard') }}">Go back to Dashboard</a>
         </div>



      </div>

      

   </form>
</div>


@endsection