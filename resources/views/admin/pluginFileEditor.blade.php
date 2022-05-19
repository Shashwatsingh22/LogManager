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
           <h4> Update Plugin Config File 📝</h4>
           <hr>
          
           <form action="{{ route('admin.plugin.file.update') }}" method="post">

           @if(Session::get('fail'))
               <div class="alert alert-danger">
                  {{ Session::get('fail') }}
               </div>
            @endif
            @csrf
<!-- Here whenever we send the POST request from this from then we need to secure
     it by the help of CROSS-SITE FORGIRY-->
      <input type="hidden" name="serverip" value= {{ $serverip }}>
    <div class="form-group">
    <textarea id="editor" name="newData" rows="30" cols="100">
              
            
     </textarea>
           @if($data['succ']==1)
              
                <script>
                  //let Jsondata = JSON.parse(JSON.stringify(@json($data['data'])))

                  let Jsondata = JSON.stringify(@json($data['data']));
                  // let b=`[`;
                  // for(let a of Jsondata)
                  // {
                  //    b+=`
                  //         {
                  //           "logaccesskey" : "${a['logaccesskey']}",\n
                  //           "projectname" : "${a['projectname']}",\n
                  //           "log" : "${a['log']}"
                  //         },
                  //        `
                     
                  // }
                  // b+=`]`;
                  document.getElementById('editor').value = Jsondata;
                  
                </script>

               
                
                 @elseif($data['succ']==0)
                 {
                   @json($data['data']) 
 
                 }
                 @else{ 
 
                    "Not Able Fetch Data" 
                   }
                
                 @endif

                <br>
                
              </div>
<br>
              <button type="submit" class="btn btn-block btn-primary">Enter</button>
              <br>

</div>


@endsection