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
                   <button onclick="viewProjectDeeply()" style="background-color: rgba(255, 0, 0, 0.555);">View Project</button>
                   <button onclick="viewLog()">View Log</button>
                </span>
            </div>
            {{-- Ends of Project Item --}}
        </div>


    </div>


    {{-- Modal Starts --}}
    <div class="devModal">

        <div >
            <div class="devHeader">
                <button class="close" onclick="closeDevModal()">
                    <i class="material-icons">close</i>
                </button>
                <span id="dev-pathName"></span>
            </div>
            <div class="devContent"></div>
        </div>

    </div>
    {{-- Modal Ends --}}


    <script>

        // Used to copy the url
        const copyRepo=()=>{
            let rep=document.getElementById('repo');
            rep.select();
            rep.setSelectionRange(0,99999);
            navigator.clipboard.writeText(rep.value);
        }






        // View Log Modal Code here
        let devModal=document.querySelector(".devModal");
        let dev_pathname=document.getElementById('dev-pathName')
        let dev_content=document.querySelector(".devContent");
        
        
        async function getLogDev(){
            const response=await fetch("http://127.0.0.1:8000/dev/log/dashboard");
            const data=await response.json();
            return data;
        }
        
        const  viewLog=()=>{
          
            devModal.style.display="flex";
            dev_pathname.innerHTML="/server-logs"
            dev_content.innerHTML=`<div class="dev_logs">
                           <p style="color:orange;">Making Request to Server,
                           </p>
                           <p>Wait a sec ....</p>
                        </div>`;
            getLogDev().then((data)=>{

                let log=data.apicall.output;
                let pItem=``;
                for(let item of log.split("\n")){
                    let m=`<small style="color:orange;">`;
                    let n=``;
                    item.split(":").forEach( (element,index)=> {
                        if(index<3){
                           m+= `${element}`;

                        }
                        else{
                            n+=`${element}`;
                        }

                    })
                    m=m+"</small>";
                    pItem+=`<p>${m} : ${n}</p>`;
                }
                dev_content.innerHTML=`<div class="dev_logs">
                            ${pItem}
                        </div>`;

                
            }).catch((error)=>{
                console.log(error);
            })
            
        }
        
        function getNumberOfDays(start) {
            const date1 = new Date(start);
            const date2 = new Date();

            // One day in milliseconds
            const oneDay = 1000 * 60 * 60 * 24;

            // Calculating the time difference between two dates
            const diffInTime = date2.getTime() - date1.getTime();

            // Calculating the no. of days between two dates
            const diffInDays = Math.round(diffInTime / oneDay);

            return diffInDays;
        }

        const viewProjectDeeply=()=>{
            devModal.style.display="flex";
            dev_content.innerHTML="";
            dev_pathname.innerHTML="/view-project"
            dev_content.innerHTML=`<div class="dev_logs">
                           <p style="color:orange;">Making Request to Server,
                           </p>
                           <p>Wait a sec ....</p>
                        </div>`;
            
            getLogDev().then((data)=>{
              let projectDetails=data.LoggedDevData;
              let days=getNumberOfDays(projectDetails.created_at);

              console.log(projectDetails);
              dev_content.innerHTML=`
                    <div class="dev_project">

                        <div class="project-item">
                            <span class="pend"></span>
                            <strong>Pending</strong>
                            <span class="days">${days} days gone</span>
                            &nbsp;&nbsp;&nbsp;
                            <span style="color:orange;">${projectDetails.serverip}</span>
                        </div>
                         

                        <div class="project-details">
                            <small>Project Name</small>
                            <h3 style="font-weight:bolder;text-transform:uppercase;">${projectDetails.projectname}</h3>
                            <p>
                                ${projectDetails.discAboutproject}
                            </p>
                            <div class="imagesGall">
                                <a target="_blank" href="https://themefisher.com/wp-content/uploads/edd/2019/04/bexer-bootstrap-business-template.jpg">
                                    <img src="https://themefisher.com/wp-content/uploads/edd/2019/04/bexer-bootstrap-business-template.jpg" async/>
                                </a>
                                <img src="https://s.tmimgcdn.com/scr/800x500/52500/free-responsive-corporate-template-website-template_52524-0-original.jpg" async/>
                                <img src="https://assets-global.website-files.com/5e593fb060cf877cf875dd1f/60b6b54cca1a1af1b2a9acea_gallery01.jpeg" async/>
                                <img src="https://cdn.dribbble.com/users/808342/screenshots/14930079/media/56de2ce055bbdbf7ec8a0515c6489448.jpg?compress=1&resize=400x300" async/>
                                <img src="https://raw.githubusercontent.com/Shashwatsingh22/LogManager/main/Arch/Arch_Main.jpeg" async/>
                            </div>
                        </div>


                        <div class="projectDetails">
                          <h3 style="font-weight:bolder;text-transform:uppercase;">What you have to do?</h3>
                          <p>
                            <strong>[Domain:<small style="color:orange;"> ${projectDetails.domain}</small>]</strong>
                            ${projectDetails.discAboutDev}
                          </p>
                          <br>    
                          <a class="link" href='${projectDetails.repolink}'>Go to Repository</a>
                          <br>
                        </div>
                   
                       

                        
                        
                    </div>`


            }).catch((error)=>{
                console.log(error);
            })
        }

        const closeDevModal=()=>{
            devModal.style.display="none";
        }
        window.onclick=function(e){
            if(e.target.getAttribute('class')=="devModal"){
                devModal.style.display="none";
            }
        }




    </script>
@endsection
