var drag_btn = document.getElementById('drag_menu');
    var com_menu = document.getElementById('com-menu');



function drag_menu(){

    drag_btn.style.display="none";
    com_menu.style.display="block";
    com_menu.style.transform="translateX(0)";

    
}
function un_drag_menu(){
    com_menu.style.transform="translateX(100%) translateX(-5px)";
    drag_btn.style.display="block";
}
