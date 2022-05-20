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
         <input type="text" name="serverip" placeholder="IP be like- 103.43.2.45" value="{{ old('servername') }}">
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


