
function toggleNav() {
    var sideMenu = document.getElementById('side-menu');
    var mainContent = document.getElementById('main-content');

    if(sideMenu.style.width != "0px") {
         sideMenu.style.width = '0px';
         mainContent.style.marginLeft = "0px";
    } else {
        sideMenu.style.width = "200px";
        mainContent.style.marginLeft = "200px";
    }

}