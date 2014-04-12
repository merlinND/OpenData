$(document).ready(function() {
	$(".arrow").click(function() {
		$('html,body').animate({
			scrollTop: window.scrollY + window.innerHeight
		}, 1000);
		$(this).fadeOut('fast');
	});
});