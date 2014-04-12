var success = function(pos) {
	var crd = pos.coords;

	$("#latitude").val(crd.latitude);
	$("#longitude").val(crd.longitude);
};

var error = function(err) {
	console.warn('ERROR(' + err.code + '): ' + err.message);
};

var options = {
	enableHighAccuracy: true,
	timeout: 5000,
	maximumAge: 0
};

navigator.geolocation.getCurrentPosition(success, error, options);


$(document).ready(function() {
	$(".col-xs-6").click(function() {
		$("#duration").val($(this).attr("data-duration"));
		$("form").submit();
	});
	
	$("form").submit(function(e){
		// console.log(e);
		// return false;
	});
});