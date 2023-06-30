var modeSwitchCount=0;
$("#mode-switch").click(function(e){
    modeSwitchCount++;
    if(modeSwitchCount%2==1)
    darkMode();
    else
    lightMode();
})
function darkMode()
{
    $("header").fadeOut("fast");
    $("header").css("background-color","rgb(24,24,35)");
    $("header").fadeIn("fast");
    $(".left_panel").fadeOut("fast");
    $(".left_panel").css("background-color","#66347F");
    $(".left_panel").fadeIn("fast");
    $(".left_panel").css("color","white");
    $(".msfl").css("color","white");
    // $("#expected").css("color","white");
    // $("#output").css("color","white");
    $(".tab").css("color","white");
    $(".tab-bar").css("background-color","#003519");
    // $(".result").css("background-color","#009FBD");
    $("#expected").css("background-color","#004D24");
    $("#output").css("background-color","#004D24");
    show_output();
}
function lightMode()
{
    $("header").fadeOut("fast");
    $("header").css("background-color","#243763");
    $("header").fadeIn("fast");
    $(".left_panel").fadeOut("fast");
    $(".left_panel").css("background-color","rgb(255, 151, 54)");
    $(".left_panel").fadeIn("fast");
    $("#expected").css("background-color","#FFEBB7");
    $("#output").css("background-color","#FFEBB7");
    $(".tab-bar").css("background-color","#8d8060");
    $(".left_panel").css("color","black");
    $(".msfl").css("color","black");
    // $("#expected").css("color","black");
    // $("#output").css("color","black");
    $(".tab").css("color","black");
    show_output();
}
function show_output() {
    let output = document.getElementById("output").style;
    let expected = document.getElementById("expected").style;
    let output_tab = document.getElementById("output-tab").style;
    let expected_tab = document.getElementById("expected-tab").style;
    output_tab.transition = "0.5s";
    expected_tab.transition = "0.5s";
    if(modeSwitchCount%2==0)
    {
        expected_tab.backgroundColor = "#8d8060";
        output_tab.backgroundColor = "#FFEBB7";
    }
    else
    {
        expected_tab.backgroundColor = "#003519";
        output_tab.backgroundColor = "#004D24";
    }
    output.zIndex = 2;
    expected.zIndex = 1;
}

function show_expected() {
    let output = document.getElementById("output").style;
    let expected = document.getElementById("expected").style;
    let output_tab = document.getElementById("output-tab").style;
    let expected_tab = document.getElementById("expected-tab").style;
    output_tab.transition = "0.5s";
    expected_tab.transition = "0.5s";
    if(modeSwitchCount%2==0)
    {
        expected_tab.backgroundColor = "#FFEBB7";
        output_tab.backgroundColor = "#8d8060";
    }
    else
    {
        expected_tab.backgroundColor ="#004D24" ;
        output_tab.backgroundColor = "#003519";
    }
    output.zIndex = 1;
    expected.zIndex = 2;
}
show_output();