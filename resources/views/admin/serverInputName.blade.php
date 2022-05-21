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
   <small>
      @error('servername')
      {{ $message }}
      @enderror
   </small>
   <br>


   @if(Session::get('fail'))
   <small>
      {{ Session::get('fail') }}
   </small>
   @endif
</div>

@endsection

