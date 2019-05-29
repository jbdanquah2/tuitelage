
var hides = document.getElementById('hide');
hides.style.display = "none";
var hide_p = document.getElementById('hide_p');

function hide_profile(elem) {
    hide_p.style.display = "none";
    hide.style.display = "block";
    hide.style.transform = "translateX(0)";
}


var hideClass = document.getElementsByClassName("hideClass");
// hideClass.style.display = "none";
 for(var i=0; i<hideClass.length; i++){
     hideClass[i].style.display="none";
 }


var drag_btn = document.getElementById('drag_menu');
var com_menu = document.getElementById('com-menu');

function drag_menu() {
    drag_btn.style.display = "none";
    com_menu.style.display = "block";
    com_menu.style.transform = "translateX(0)";
}

function un_drag_menu() {
    com_menu.style.transform = "translateX(100%) translateX(-5px)";
    drag_btn.style.display = "block";
}
