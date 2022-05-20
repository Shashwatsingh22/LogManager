@extends('layouts.admin.dashboard.main')

@section('title',"Admin Dashboard")

@section('name',$LoggedAdminData['name'])

@section('teamkey',$LoggedAdminData['teamkey'])

@section('email',$LoggedAdminData['email'])

@section('disc',$LoggedAdminData['discription'])

@section('content') 




<div class="input-ip-area">
   <form action="{{ route('admin.plugin.file.Editor') }}" method="post" class="input-main">
      @csrf
      <div class="input-left">
         <i class="fa fa-globe"></i>
      </div>
      <div class="input-right">
         <p >Enter your IP Address Here</p>
         <input type="text" name="serverip" placeholder="IP be like- 127.0.0.1" value="{{ old('servername') }}">
         <button type="submit">Get Into It</button>
      </div>
   </form>
   <small>@error('serverip'){{ $message }} @enderror</small><br>
   @if(Session::get('fail'))
   <small>
      {{ Session::get('fail') }}
   </small>
   @endif
</div>
@endsection




{{-- Old Work--}}
{{-- <div class="">
</div>


<div class="container">
   <div class="row">
      <div class="col-md-4 col-md-offset-4">
           <h4> Provide ServerIP 🖥 | Update KeysMap File</h4>
           <hr>

         <form action="{{ route('admin.plugin.file.Editor') }}" method="post">
           
           @if(Session::get('fail'))
               <div class="alert alert-danger">
                  {{ Session::get('fail') }}
               </div>
            @endif
            @csrf
    <div class="form-group">
                 <label>IP </label>
                 <input type="text" class="form-control" name="serverip" placeholder="Enter Server IP" value="{{ old('serverip') }}">
                <br>
                 <span class="text-danger">@error('serverip'){{ $message }} @enderror</span>
              </div>
<br>
              <button type="submit" class="btn btn-block btn-primary">Enter</button>
              <br>

</div> --}}
