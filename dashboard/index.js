var modeSwitchCount=0;
$("#mode-switch").click(function(e){
    modeSwitchCount++;
    if(modeSwitchCount%2==1)
    darkMode();
    else
    lightMode();
});
function darkMode()
{
    $("#motivation").fadeOut("fast");
    $("#motivation").css("background-color","#2B2730");
    $("#motivation").fadeIn("fast");
    $("#quot").fadeOut();
    $("#quot").css("color","white");
    $("#quot").fadeIn();
    $("#progress").fadeOut();
    $("#progress").css("background-color","#9336B4");
    $("#progress").fadeIn();
    $(".lesson").fadeOut();
    $(".lesson").css("background-color","#0EA293");
    $(".lesson").fadeIn();
    $(".lesson p").fadeOut();
    $(".lesson p").css("color","white");
    $(".lesson p").fadeIn();
    $(".btn").fadeOut();
    $(".btn").css("background-color","#FFD93D");
    $(".btn").css("color","#2B2730");
    $(".btn").fadeIn();
    $("footer").fadeOut();
    $("footer").css("background-color","#4F4557");
    $("footer").css("color","white");
    $("footer").fadeIn();
    $("header").fadeOut();
    $("header").css("background-color","#181823");
    $("header").fadeIn();
}
function lightMode()
{
    $("#motivation").fadeOut("fast");
    $("#motivation").css("background-color","#FFEBB7");
    $("#motivation").fadeIn("fast");
    $("#quot").fadeOut();
    $("#quot").css("color","black");
    $("#quot").fadeIn();
    $("#progress").fadeOut();
    $("#progress").css("background-color","#FF6969");
    $("#progress").fadeIn();
    $(".lesson").fadeOut();
    $(".lesson").css("background-color","#F6F1F1");
    $(".lesson").fadeIn();
    $(".lesson p").fadeOut();
    $(".lesson p").css("color","black");
    $(".lesson p").fadeIn();
    $(".btn").fadeOut();
    $(".btn").css("background-color","rgb(48, 200, 214)");
    $(".btn").css("color","white");
    $(".btn").fadeIn();
    $("footer").fadeOut();
    $("footer").css("background-color","#AD8E70");
    $("footer").css("color","black");
    $("footer").fadeIn();
    $("header").fadeOut();
    $("header").css("background-color","#243763");
    $("header").fadeIn();
}
$("#lesson1Button").on("mouseover",function(e){
    $("#lesson1Button").animate({opacity:0.7});
});
$("#lesson1Button").on("mouseout",function(e){
    $("#lesson1Button").animate({opacity:1});
});
$("#lesson2Button").on("mouseover",function(e){
    $("#lesson2Button").animate({opacity:0.7});
});
$("#lesson2Button").on("mouseout",function(e){
    $("#lesson2Button").animate({opacity:1});
});
$("#lesson3Button").on("mouseover",function(e){
    $("#lesson3Button").animate({opacity:0.7});
});
$("#lesson3Button").on("mouseout",function(e){
    $("#lesson3Button").animate({opacity:1});
});


// let var1 = document.getElementById('lesson1Button');

// var1.addEventListener('click',function(){
//     window.location.href = 'http://localhost/sdf_web/sdf_project/Basics%20of%20CSS/Lesson%201';

// });


