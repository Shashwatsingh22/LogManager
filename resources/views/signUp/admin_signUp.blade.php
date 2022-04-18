@extends('layouts.users.admin.login_signup')

@section('title',"Sign Up")

@section('content') 

<div class="formAuth">
   <h1>Sign Up For Admin</h1>
   <form action="{{ route('admin.signup.save') }}" method="post">
          
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
            <input type="text" class="form-control" name="name" placeholder="Enter full name" value="{{ old('name') }}">
            <span class="text-danger">@error('name'){{ $message }} @enderror</span>


            <input type="text" class="form-control" name="jobid" placeholder="Enter JobID" value="{{ old('jobid') }}">
            <span class="text-danger">@error('jobid'){{ $message }} @enderror</span>
       

            <input type="text" class="form-control" name="email" placeholder="Enter Email" value="{{ old('email') }}">
            <span class="text-danger">@error('email'){{ $message }} @enderror</span>
          

            <input type="password" class="form-control" name="accesskey" placeholder="Enter the Acess Key" value="{{ old('accesskey') }}">
            <span class="text-danger">@error('accesskey'){{ $message }} @enderror</span>



            <input type="password" class="form-control" name="teamkey" placeholder="Enter the Team Key" value="{{ old('disc') }}">
            <span class="text-danger">@error('teamkey'){{ $message }} @enderror</span>
          


            <input type="text" class="form-control" name="username" placeholder="Enter the Username" value="{{ old('username') }}">
            <span class="text-danger">@error('username'){{ $message }} @enderror</span>



            <input type="password" class="form-control" name="password" placeholder="Set the Password">
            <span class="text-danger">@error('password'){{ $message }} @enderror</span>



            <textarea type="text" class="form-control" name="disc" placeholder="Write Short Discription" value="{{ old('disc') }}"></textarea>
            <span class="text-danger">@error('disc'){{ $message }} @enderror</span>
            <button type="submit" >Create Admin Account</button>

         </div>


         <div class="haveAcc">
            <p>Already have an account ?</p>&nbsp;&nbsp;
            <a href="{{ route('login') }}">Sign In</a>
         </div>


      </div>

      

   </form>
</div>
@endsection   