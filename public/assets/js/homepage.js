var options = {
	enableHighAccuracy: true,
	timeout: 5000,
	maximumAge: 0
};

function success(pos) {
	var crd = pos.coords;

	$("#latitude").val(crd.latitude);
	$("#longitude").val(crd.longitude);
};

function error(err) {
	console.warn('ERROR(' + err.code + '): ' + err.message);
};

navigator.geolocation.getCurrentPosition(success, error, options);

$(document).ready(function() {
	$(".col-xs-6").click(function() {
		$("#duration").val($(this).attr("data-duration"));
		$("form").submit();
	});
});