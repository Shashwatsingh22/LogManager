const modalContent=document.querySelector(".modalContent");
const modalArea=document.querySelector(".modalArea");
const modalInfo=document.querySelector(".modalInfo");
const modalInfo2=document.querySelector(".modalInfo2");

let modalPath=document.getElementById("pathName");

const closeModal=()=>{

    modalContent.style.display="none";

}
const editRecord=(e)=>{

    modalContent.style.display="flex";
    modalPath.innerText=`${window.location.pathname}/editRecord`;
    modalInfo.style.display="none";
    modalInfo2.style.display="flex";



    // Edit Form Object
    const editFormOldDetails={
        id:e.target.getAttribute("id"),
        email:e.target.getAttribute("email"),
        logaccesskey:e.target.getAttribute("logaccesskey"),
        projectname:e.target.getAttribute("projectname"),
        repolink:e.target.getAttribute("repolink"),
        serverip:e.target.getAttribute("serverip")
    }
    const formParent=modalInfo2.children[1];
    formParent.setAttribute("action",`/admin/dev/edit/${editFormOldDetails.id}`);
    
    formParent.children[1].value=editFormOldDetails.serverip;
    formParent.children[2].value=editFormOldDetails.email;
    formParent.children[3].value=editFormOldDetails.logaccesskey;
    formParent.children[4].value=editFormOldDetails.projectname;
    formParent.children[5].value=editFormOldDetails.repolink;








}

const delDeveloper=()=>{
    modalContent.style.display="flex";
    modalInfo.style.display="flex";
    modalInfo2.style.display="none";


    modalPath.innerText=`${window.location.pathname}/delDeveloper`;
 
}





window.onclick=function(e){
    if(e.target.getAttribute('class')=="modalContent"){
        gsap.from(".modalArea", {duration: 0.5,y:-100,width:0,height:0, opacity:0.1});
        modalContent.style.display="none";
       
    }
}