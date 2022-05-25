@extends('layouts.dev.dashboard.main')

@section('title'," Dev Dashboard")

@section('name',$LoggedDevData['name']??"")

@section('teamkey',$LoggedDevData['teamkey']??"")

@section('email',$LoggedDevData['email']??"")

@section('disc',$LoggedDevData['discAboutDev']??"")

@section('content') 
    <div class="tasksContent">
        <h4>Today's Tasks Distribution</h4>
        <div class="tasksGrid">

            {{-- Project Item --}}
            <script>
                console.log(@json($LoggedDevData))
            </script>
            
            <div class="task-grid-item">
                <span class="ip">{{ $LoggedDevData['serverip']??"" }}</span>
                <h6>{{ $LoggedDevData['projectname']??"" }}
                    
                    <small><small>via</small></small>
                    <small style="color:white;">{{ $LoggedDevData['domain']??"" }}</small>

                </h6>
                <span class="repoLink">
                    <input class="repo" id="repo" value="{{ $LoggedDevData['repolink']??"" }}"/>
                    <i class="material-icons" style="cursor:pointer;" onclick="copyRepo()">content_copy</i>    
                </span>

                <span class="actions">
                   <a href=" {{ route('admin.dev.signup') }} " style="background-color: rgba(255, 0, 0, 0.555);">View Project</a>
                   <a href="{{ route('dev.log.dashboard') }}">View Log</a>
                </span>
            </div>
            {{-- Ends of Project Item --}}
        </div>


    </div>

    <script>
        const copyRepo=()=>{
            let rep=document.getElementById('repo');
            rep.select();
            rep.setSelectionRange(0,99999);
            navigator.clipboard.writeText(rep.value);


            
        }
    </script>
@endsection
