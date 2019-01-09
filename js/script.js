var wdth = document.getElementById("mySidebar");

function openNav() {

    wdth.style.width = "150px";
    //    document.getElementById("main").style.marginLeft = "150px";
    return this.wdth = true;
}

function closeNav() {
    wdth.style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    return this.wdth = false;
}


function toggleMenu() {
    if (this.wdth === false) {
        this.closeNav();
    } else if (this.wdth === true) {
        this.closeNav();
    }
}
