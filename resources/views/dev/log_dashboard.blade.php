@extends('layouts.dev.dashboard.main')

@section('title',"👩‍💻 Log Dashboard")

@section('logcss',"/css/logs1.css")

@section('name',$LoggedDevData['name'])

@section('teamkey',$LoggedDevData['teamkey'])

@section('email',$LoggedDevData['email'])

@section('disc',$LoggedDevData['discAboutDev'])

@section('content') 

<center>
<div>

<div style="width: 80%;height: 60px ; background-color: grey; position: relative">
   <center><h4 style="color: white;top:10px;position: relative"> {{ $LoggedDevData['username']."@".$LoggedDevData['serverip'] }} </h4> <center>
   <input type="image" name="close" id="" src="/images/close.png" height="50% " value="❌" style="position: absolute; left: 95%; top:10px;" >
 <input type="image" name="maxi" class="" src="/images/maximize.png" height="50% " style="position: absolute; left: 90%; top:10px;" >
 <input type="image" name="mini" class="" src="/images/minimize.png" height="50% " style="position: absolute; left: 85%; top:10px;">
 <input type="image" name="search" class="" src="/images/search.png" height="50% "style="position: absolute; left: 10%; top:10px;"> 
 
 <a href="{{ route('dev.log.dashboard') }}" ><input type="image" name="refresh"   class="refresh" src="/images/refresh.png" height="50%"  style="position: absolute; left: 5%; top:10px"> </a>
 

</div>

   <div style="width: 80%;height: 50rem ; background-color: black; bottom:20px; position: relative">
    <div style="position: relative; top:15px"> <h4 style="color: aqua">
            @if($apicall['message'])
                
                {{ $apicall['message'] }} 
               
                @else{ "Not Able Fetch Data" }
               
                @endif
                              </h4></div>
<div style="width: 100%;height: 45rem; overflow-y: scroll; postion: relative; top: 5px">

   <h4 style=" padding: 25px 50px 75px 100px; color: green"> 

          
         <div id="logs" style="width:100%">
             
         </div>
                 
</h4>
</div>
</div>
    
</div>
</center>

<script>
   const log = @json($apicall);
   //console.log(log['output'].split('\n'));
   let data;
   let  output="";

   if(log['succ']==1)
   {
      for(data of log['output'].split('\n'))
      {
         output+=data+"<br>";
      }
   }
   else
   {
      output+=log['status'];
   }
   
   console.log(output);
   document.getElementById('logs').innerHTML=output;
</script>

@endsection 