@extends('layouts.users.admin.login_signup')
{{-- @extends('layouts.home.main') --}}
@section('title',"Login")




@section("content")

            {{-- Form --}}
            <div class="formAuth">
               <h1>Sign In</h1>
               <form action="{{ route('login.check') }}" method="post">
                  
                  @if(Session::get('fail'))
                     <p class="text-danger">
                        {{ Session::get('fail') }}
                     </p>
                  @endif


                  @csrf
                  <div class="chooseAcc">
                     <p class="targetP">Please choose your account</p>

                     <div class="choices">
                       
                        <div class="item">
                           <input class="form-check-input" type="radio" name="mode" id="exampleRadios1" value="admin" checked>
                           &nbsp;
                           <label class="form-check-label" for="exampleRadios1">
                              Project Manager
                           </label>
                        </div>

                        <div class="item">
                           <input class="form-check-input" type="radio" name="mode" id="exampleRadios2" value="gen-user">
                           &nbsp;
                           <label class="form-check-label" for="exampleRadios2">
                               Devloper
                           </label>
                        </div>

                     </div>


                     <div class="entryInputs">
                        <input type="text"  name="username" placeholder="Enter Username" value="{{ old('username') }}">
                        <span class="text-danger">@error('username'){{ $message }} @enderror</span>
                     

                       <input type="password"  name="password" placeholder="Enter password">
                       <span class="text-danger">@error('password'){{ $message }} @enderror</span>


                        <button type="submit" >Sign In</button>

                     </div>

                     
                     <div class="haveAcc">
                        <p>Don't have an account ?</p>&nbsp;&nbsp;
                        <a href="{{ route('admin-signup') }}">Sign Up</a>
                     </div>


                  </div>

                  

               </form>
            </div>




    
@endsection
