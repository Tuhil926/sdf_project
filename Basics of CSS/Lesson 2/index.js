createSlide();
function createSlide()
{
    let box=$("#slide2");
    box.css("width","100%");
    let x=box.css("width").slice(0,-2);
    // alert(x);
    let a=x/30;
    box.css("margin",a+"px");
    box.css("height","548px");
    x-=2*a;
    box.css("width",x+"px");
    x=548+2*a;
    $("#main-container").css("height",x+"px");
    box.css("background-color","#408E91");
}
// dark-mode: #2B2A4C