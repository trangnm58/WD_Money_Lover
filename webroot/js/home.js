var main = function() {
	$('#toggle-menu').click(function() {
		if ($('#content').hasClass("noti-hide")) {
			// noti is hiding content
			$('#content').removeClass("noti-hide");
			$('#content').addClass("menu-hide");
		} else if ($('#content').hasClass("menu-hide")) {
			// menu is hiding content
			$('#content').show();
			$('#content').removeClass("menu-hide");
		} else {
			$('#content').hide();
			$('#content').addClass("menu-hide");
		}
		$('#side-menu').toggle();
		$('#side-menu').animate({scrollTop : 0}, 0);
		$('#side-noti').hide();
	});
	
	if (screen.width < 768) {
		// noti appears full screen in phones
		$('#toggle-noti').click(function() {
			if ($('#content').hasClass("menu-hide")) {
				// menu is hiding content
				$('#content').removeClass("menu-hide");
				$('#content').addClass("noti-hide");
			} else if ($('#content').hasClass("noti-hide")) {
				// noti is hiding content
				$('#content').show();
				$('#content').removeClass("noti-hide");
			} else {
				$('#content').hide();
				$('#content').addClass("noti-hide");
			}
			$('#side-noti').toggle();
			$('#side-noti').animate({scrollTop : 0}, 0);
			$('#side-menu').hide();
		});
	} else {
		$('#toggle-noti').click(function() {
			$('#side-noti').css("position", "absolute");
			$('#side-noti').css("right", "0");
			$('#side-noti').css("z-index", "10");
			$('#side-noti').toggle();
		});
	}
};

$(document).ready(main);
