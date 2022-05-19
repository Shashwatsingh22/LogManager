@extends('layouts.admin.dashboard.main')

@section('title',"Admin Dashboard")

@section('name',$LoggedAdminData['name'])

@section('teamkey',$LoggedAdminData['teamkey'])

@section('email',$LoggedAdminData['email'])

@section('disc',$LoggedAdminData['discription'])

@section('content') 

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

</div>
@endsection