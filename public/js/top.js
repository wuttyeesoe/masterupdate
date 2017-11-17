
function myFunction() {
    var top = document.forms[0];
    var txt="";
    var i;
    for (i = 0; i < top.length; i++) {
        if (top[i].checked) {
            txt = txt + top[i].value + " ";
        }
    }
  
}

