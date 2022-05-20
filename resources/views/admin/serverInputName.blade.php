@extends('layouts.admin.dashboard.main')

@section('title',"Admin Dashboard")

@section('name',$LoggedAdminData['name'])

@section('teamkey',$LoggedAdminData['teamkey'])

@section('email',$LoggedAdminData['email'])

@section('disc',$LoggedAdminData['discription'])

@section('content') 


<div class="input-ip-area">
   <form action="{{ route('admin.server.config') }}" method="get" class="input-main">
      <div class="input-left">
         <i class="	fa fa-server"></i>
      </div>
      <div class="input-right">
         <p >Enter Server name Here</p>
         <input type="text" name="servername" placeholder="Server be like- 127.0.0.1" value="{{ old('servername') }}">
         <button type="submit">Configure Server</button>
      </div>
   </form>
   <small>@error('servername'){{ $message }} @enderror</small><br>
   @if(Session::get('fail'))
   <small>
      {{ Session::get('fail') }}
   </small>
   @endif
</div>

@endsection



{{-- Old work --}}
{{-- 
<div class="container">
   <div class="row">
      <div class="col-md-4 col-md-offset-4">
           <h4> Provide ServerName 🖥 | Configuration</h4>
           <hr>

           <form action="{{ route('admin.server.config') }}" method="get">

           @if(Session::get('fail'))
               <div class="alert alert-danger">
                  {{ Session::get('fail') }}
               </div>
            @endif

<!-- Here whenever we send the POST request from this from then we need to secure
     it by the help of CROSS-SITE FORGIRY-->

    <div class="form-group">
                 <label>ServerName</label>
                 <input type="text" class="form-control" name="servername" placeholder="Enter ServerName" value="{{ old('servername') }}">
                <br>
                 <span class="text-danger">@error('servername'){{ $message }} @enderror</span>
              </div>
<br>
              <button type="submit" class="btn btn-block btn-primary">Configure</button>
              <br>

</div> --}}