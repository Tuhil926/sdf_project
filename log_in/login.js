// 


let click = document.getElementById("sign_in");
let img1 = document.getElementById("image1");
let img2 = document.getElementById("image2");
let bs = document.getElementById("popup");
bs.style.display = "none";
let b = document.getElementById("popup1");
img2.style.display = "none";

 function show2() {
    b.style.display = "block";
    bs.style.display = "none";
    img1.style.display = "block";
    img2.style.display = "none";


}

// let b = document.getElementById("popup1");
b.style.display = "block";

 function show1() {
    bs.style.display = "block";
    b.style.display = "none";
    img1.style.display = "none";
    img2.style.display = "block";



}


