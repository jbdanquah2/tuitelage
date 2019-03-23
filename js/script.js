function openNav() {

    document.getElementById("mySidebar").style.width = "200px";
    var pageWidth = 752;
    console.log(pageWidth);
    if(document.documentElement.clientWidth >= pageWidth ){
document.getElementById("chng-menu").style.display = "none";
    }

}

function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    if(document.getElementById("chng-menu").style.display = "none"){
        document.getElementById("chng-menu").style.display = "block";
    }
    //    return this.wdth = false;
}
