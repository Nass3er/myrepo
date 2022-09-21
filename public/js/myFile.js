
function loadMore( id) {
    var dots=document.getElementById("dots-"+ id);
    var moreText=document.getElementById("more-"+ id);
    var btn=document.getElementById("myBtn");
    if (moreText.style.display==="none") {
        moreText.style.display="inline";
        dots.innerText="ReadLess";

    }else{
        moreText.style.display="none";
        dots.style.display="inline";
        dots.innerText="ReadMore";
    }

}


 let switcher=document.querySelectorAll(".switcher li");
 switcher.forEach((li)=>{
li.addEventListener("click",removeActive);
 });
 function removeActive(){
     switcher.forEach((li)=>{
         li.classList.remove("active");
         this.classList.add("active");
         this.style="border-radius:14px;color:white";

     });
 }

function hertFull( id){
var htsvg=document.getElementById("ht-"+ id);
   htsvg.style=" color:red;";
   
}


