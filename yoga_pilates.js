const progress = document.getElementById("progress");
const prev = document.getElementById("prev");
const next = document.getElementById("next");
const circles = document.querySelectorAll(".circle");

let currentActive = 0;

next.addEventListener("click",()=>{
    currentActive++;
    if (currentActive > circles.length){
        currentActive = circles.length;
    }
    circle();
});

function circle(){
    circles.forEach((circle,idx)=>{
        if(idx < currentActive){
            circle.classList.add("active");
        }
    });
    const actives = document.querySelectorAll(".active");
    progress.style.width=((actives.length-3)/(circles.length-1)) *100 +"%";
} 

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {  
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i,
      x = document.getElementsByClassName("video-slide"),
      y = document.getElementsByTagName("video");
  
  if (n > x.length) {
    slideIndex = 1
  }
  
  if (n < 1) {
    slideIndex = x.length
  }
  
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
    y[i].pause();
  }
  
  x[slideIndex-1].style.display = "block";
}

