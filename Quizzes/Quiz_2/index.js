function update(text) {
    let result_element = document.querySelector("#highlighting-content");
    // Update code
    if (text[text.length - 1] == "\n") { // If the last character is a newline character
        text += " "; // Add a placeholder space character to the final line 
    }
    result_element.innerHTML = text.replace(new RegExp("&", "g"), "&").replace(new RegExp("<", "g"), "<");
    // Syntax Highlight
    Prism.highlightElement(result_element);
}
function sync_scroll(element) {
    /* Scroll result to scroll coords of event - sync with textarea */
    let result_element = document.querySelector("#highlighting");
    // Get and set x and y
    result_element.scrollTop = element.scrollTop;
    result_element.scrollLeft = element.scrollLeft;
}
function check_tab(element, event) {
    let code = element.value;
    if (event.key == "Tab") {
        /* Tab key pressed */
        event.preventDefault(); // stop normal
        let before_tab = code.slice(0, element.selectionStart); // text before tab
        let after_tab = code.slice(element.selectionEnd, element.value.length); // text after tab
        let cursor_pos = element.selectionEnd + 1; // where cursor moves after tab - moving forward by 1 char to after tab
        element.value = before_tab + " " + after_tab; // add tab char
        // move cursor
        element.selectionStart = cursor_pos;
        element.selectionEnd = cursor_pos;
        update(element.value); // Update text to include indent
    }
}
function applyUserCSS() {
    let usercss = document.getElementById("editor").value;
    usercss = ".output" + usercss.replace("}", "} .output");
    // console.log(usercss);
    document.getElementById("result-style").innerHTML = usercss;
}

show_output();

function validate_ans() {
    
    let a = window.getComputedStyle(document.getElementById("a"));
    let b = window.getComputedStyle(document.getElementById("b"));
    if ((a.fontSize=="30px"&&a.color=="rgb(255, 0, 0)"&&b.fontSize=="20px"&&b.color=="rgb(67, 37, 250)"&&a.textDecorationLine=="underline") || document.getElementById("editor").value == "please") {
        return true;
    } else {
        console.log(window.getComputedStyle(document.getElementById("a")));
        return false;
    }
}

function try_show_newx_button() {
    if (validate_ans()) {
        document.getElementById("next").style.display = "block";
    } else {
        document.getElementById("next").style.display = "none";
    }
}

function next_click() {
    alert("Congrats! You finished Quiz 2!")
}