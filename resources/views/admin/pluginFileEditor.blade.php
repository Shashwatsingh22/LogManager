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

           <form action="{{ route('admin.server.editor') }}" method="get">

           @if(Session::get('fail'))
               <div class="alert alert-danger">
                  {{ Session::get('fail') }}
               </div>
            @endif

<!-- Here whenever we send the POST request from this from then we need to secure
     it by the help of CROSS-SITE FORGIRY-->

    <div class="form-group">
    <textarea id="w3review" name="w3review" rows="30" cols="400">
     </textarea>
                <br>
                 <span class="text-danger">@error('servername'){{ $message }} @enderror</span>
              </div>
<br>
              <button type="submit" class="btn btn-block btn-primary">Enter</button>
              <br>

</div>


@endsection