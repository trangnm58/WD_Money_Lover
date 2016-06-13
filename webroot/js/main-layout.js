
function toggleSideMenu() {
    if (document.getElementById("side-menu").style.width == "250px") {
        closeSideMenu();
    } else {
        openSideMenu();
    }
}
function closeSideMenu() {
    if ($(window).width() < 768) {
        document.getElementById("side-menu").style.width = "0px";
        document.body.style.backgroundColor = "white";
    }
	$("#content *").css("opacity", 1);
}
function openSideMenu() {
    if ($(window).width() < 768) {
        document.getElementById("side-menu").style.width = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.7)";
        if (document.getElementById("side-noti").style.width == "250px") {
            document.getElementById("side-noti").style.width = "0px";
        }
    }
	$("#content *").css("opacity", 0);
	$("#side-menu *").css("opacity", 1);
}

function toggleSideNoti() {
    if (document.getElementById("side-noti").style.width == "250px") {
        closeSideNoti();
    } else {
        openSideNoti();
    }
}
function closeSideNoti() {
    if ($(window).width() < 1200) {
        document.getElementById("side-noti").style.width = "0px";
        document.body.style.backgroundColor = "white";
    }
	$("#content *").css("opacity", 1);
	$("#side-menu *").css("opacity", 1);
}
function openSideNoti() {
    if ($(window).width() < 1200) {
        document.getElementById("side-noti").style.width = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.7)";
        if (document.getElementById("side-menu").style.width == "250px") {
            document.getElementById("side-menu").style.width = "0px";
        }
    }
	
	// blur content and side-menu
	$("#content *").css("opacity", 0);
	$("#side-menu *").css("opacity", 0);
}

function closeAllMenu() {
    closeSideMenu();
    closeSideNoti();
}


// check if there are notifications
if ($("#side-noti ul li").length > 1) {
	$(".navbar-noti").addClass("has-noti");
}
