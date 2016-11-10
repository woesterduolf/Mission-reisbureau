$(function() {
	$("#mr-payment-options-container #mr-payment").change(function() {
		var value = $(this).val();

		if (value == "ideal") {
			$("#mr-paypal-wrapper").fadeOut("fast");
			$("#mr-creditcard-wrapper").fadeOut("fast");
			$("#mr-ideal-wrapper").fadeIn("slow");
		}
		if (value == "credit") {
			$("#mr-ideal-wrapper").fadeOut("fast");
			$("#mr-paypal-wrapper").fadeOut("fast");
			$("#mr-creditcard-wrapper").fadeIn("slow");
		}
		if (value == "paypal") {
			$("#mr-ideal-wrapper").fadeOut("fast");
			$("#mr-creditcard-wrapper").fadeOut("fast");
			$("#mr-paypal-wrapper").fadeIn("slow");
		}
	});
});
