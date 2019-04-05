function nav_open() {   
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.getElementById("open_btn").style.display = "none";
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("main").style.transition = "0.5s";
    document.getElementById("mySidebar").style.transition = "0.5s";
    document.getElementById("x_btn").style.display = "block";
}

function nav_close() { 
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "8.3%";
    document.getElementById("open_btn").style.display = "block";
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("main").style.transition = "0.5s";
    document.getElementById("mySidebar").style.transition = "0.5s";
    document.getElementById("x_btn").style.display = "none";
}

function already_here() {
    alert('You are already here');
    nav_close();
}

function Add_lesson() {
    var x = document.forms["new_lesson"]["lesson_title"].value;
    if (x == null || x == "") {
        alert("Lesson title not Entered");
        return false;
    }
    var r = confirm("New Lesson Added \n Do you want to add Topics?");
    if (r == true) {
        window.location.assign("Topic_create.html");
    }
    else {
        return false;
    }
}

function Add_topic() {
    var x = document.forms["Add_topic"]["lessons"].value;
    if (x == null || x == "" || x == "....") {
        alert("Lesson title not Entered");
        return false;
    }
    var r = confirm("New Topic Added \n Do you want to add another?");
    if (r == true) {
        return true;
    }
    else {
        return false;
    }
}

function new_topic() {
    document.getElementById("add_topic").style.display = "none";
    document.getElementByid("add_new_topic").style.display = "block";
    return 0;
}

function open_summary() {
    document.getElementById("card_summary").style.height = "300px";
}

function close_summary() {
    document.getElementById("card_summary").style.height = "30px";
}

function show_add_topic() {
    document.getElementById("addTopics").style.display = "block";
}