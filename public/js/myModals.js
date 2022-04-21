const modalContent=document.querySelector(".modalContent");
const modalArea=document.querySelector(".modalArea");
const modalInfo=document.querySelector(".modalInfo");
const modalInfo2=document.querySelector(".modalInfo2");

let modalPath=document.getElementById("pathName");

const closeModal=()=>{

    modalContent.style.display="none";

}
const editRecord=()=>{
    modalContent.style.display="flex";
    modalPath.innerText=`${window.location.pathname}/editRecord`;
    modalInfo.style.display="none";




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