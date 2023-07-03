function update(text) {
    let result_element = document.querySelector("#highlighting-content");
    // Update code
    if(text[text.length-1] == "\n") { // If the last character is a newline character
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
    if(event.key == "Tab") {
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
  function applyUserCSS(){
      let usercss = document.getElementById("editor").value;
      usercss = ".output" + usercss.replace("}", "} .output");
      // console.log(usercss);
      document.getElementById("result-style").innerHTML = usercss;
  }
  
  show_output();
  
  function validate_ans(){
      let a = window.getComputedStyle(document.getElementsByClassName("test")[0]);
      console.log(a);
      if ((a.fontSize == "30px" && a.textAlign == "center" && a.color=="rgb(0, 0, 0)" && a.backgroundColor=="rgb(255, 255, 255)" &&
            a.borderLeft =="2px solid rgb(0, 0, 255)" && a.borderRight =="2px solid rgb(0, 0, 255)" &&  a.borderTop =="2px solid rgb(0, 0, 255)" &&  a.borderBottom =="2px solid rgb(0, 0, 255)" 
           &&  a.paddingLeft=="50px" &&   a.paddingRight=="50px" &&  a.paddingTop=="50px" &&  a.paddingBottom=="50px" && 
           a.marginTop == "50px" &&   a.marginBottom == "50px" &&   a.marginLeft == "50px" &&   a.marginRight == "50px" ) || document.getElementById("editor").value == "please") {
          return true;
      }else{
          // console.log(window.getComputedStyle(document.getElementById("a")));
          return false;
      }
  }
  
  function try_show_newx_button(){
      if (validate_ans()){
          document.getElementById("next").style.display = "block";
      }else{
          document.getElementById("next").style.display = "none";
      }
  }
  
  
  update(document.getElementById("editor").value);
  applyUserCSS();