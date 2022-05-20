@extends('layouts.admin.dashboard.main')

@section('title',"Admin Dashboard")

@section('name',$LoggedAdminData['name'])

@section('teamkey',$LoggedAdminData['teamkey'])

@section('email',$LoggedAdminData['email'])

@section('disc',$LoggedAdminData['discription'])

@section('content') 


<form  class="editorMain" action="{{ route('admin.plugin.file.update') }}" method="post">
    @csrf
    <input type="hidden" name="serverip" value= {{ $serverip }}>
    <h3>
      Edit/<strong style="color:#f8a530 !important;">Update</strong> Configurations with 
      <strong style="background-color: #f8a530be;color:white;padding:5px;border-radius:5px;">{{ $serverip }}</strong>
    </h3>
    <p>
      Make sure the syntax of JSON object remain same,Other wise it may lead crashes 
    </p>

    <p style="color:white;font-weight:bolder;">Config.json</p>
    <br>
    <textarea id="editor" name="newData" rows="30" cols="100"></textarea>
    <button type="submit">Update Config &nbsp;<i class="fa fa-refresh"></i></button>
    
    @if(Session::get('fail'))
      <small>
        {{ Session::get('fail') }}
      </small>
    @endif
</form>




@if($data['succ']==1)
  <script>


    let Jsondata = JSON.parse(JSON.stringify(@json($data['data'])))
    let isSuccess=JSON.parse(JSON.stringify(@json($data))).succ;
    if(isSuccess){
      callToast("Success,Everything is up to date");
      readFromApi()
    }
    else{
      callToast("Oops,Something went wrong","red");
    }


    // Read API
    function readFromApi(){
      let dummy=`[`;
      let flag=0;
      let sizeOfData = Jsondata.length;
      
      for(let data of Jsondata)
      {
        dummy+=`
            {
              "logaccesskey" : "${data['logaccesskey']}",\n
              "projectname" : "${data['projectname']}",\n
              "log" : "${data['log']}"
            }`
            flag++;
        
            if(flag!=sizeOfData) dummy+=',';  
      }
      dummy+=`
      ]`;

      document.getElementById('editor').value = dummy;

    }
    // Call Toast
    function callToast(value,colorCode="#f8a530"){
        Toastify({
            text: value,
            className: "info",
            offset: {
                x: 50,
                y: 30 
              },
            style: {
              background: colorCode,
              borderRadius:"5px",
              fontWeight:"bolder",
            }
          }).showToast();
    }

    

    const editor = CodeMirror.fromTextArea(document.getElementById('editor'), {
      lineNumbers: true,
      mode: {name:"javascript",json:true},
      theme: 'lucario',
    });

  </script>
@elseif($data['succ']==0)
{
  @json($data['data']) 
}
@else{ 
   "Not Able Fetch Data" 
}
@endif



@endsection
