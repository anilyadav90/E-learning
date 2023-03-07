let testimonial=document.getElementsByClassName("testimonials")[0];
let control1=document.getElementById("control1");
let control2=document.getElementById("control2");
let control3=document.getElementById("control3");


function show1(){
    testimonial.style.transform="translateX(625px)";
    control1.classList.add("active");
    control2.classList.remove("active");
    control3.classList.remove("active");

}

function show2(){
    testimonial.style.transform="translateX(625px)";
    control1.classList.remove("active");
    control2.classList.add("active");
    control3.classList.remove("active");

}

function show3(){
    testimonial.style.transform="translateX(-610px)";
    control1.classList.remove("active");
    control2.classList.remove("active");
    control3.classList.add("active");

}