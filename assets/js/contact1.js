(function($){

	$(document).ready(function() {

		/* ---------------------------------------------- /*
		 * Contact form ajax
		/* ---------------------------------------------- */

		$('#contact-form').find('input,textarea').jqBootstrapValidation({
			preventSubmit: true,
			submitError: function($form, event, errors) {
				// additional error messages or events
			},
			submitSuccess: function($form, event) {
				event.preventDefault();

				var submit          = $('#contact-form submit');
				var ajaxResponse    = $('#contact-response');

				var name            = $("input#cname").val();
				var email           = $("input#cemail").val();
				var tel				= $("input#ctel").val();
				var services		= $("input#cservices").val();
				var budget			= $("input#cbudget").val();
				var date			= $("input#cdate").val();
				var message         = $("textarea#cmessage").val();

				$.ajax({
					type: 'POST',
					url: 'assets/php/contact2.php',
					dataType: 'json',
					data: {
						name: name,
						email: email,
						tel: tel,
						services: services,
						budget: budget,
						date: date,
						message: message,
					},
					cache: false,
					beforeSend: function(result) {
						submit.empty();
						submit.append('<i class="fa fa-cog fa-spin"></i> Wait...');
					},
					success: function(result) {
						if(result.sendstatus == 1) {
							ajaxResponse.html(result.message);
							$form.fadeOut(500);
						} else {
							ajaxResponse.html(result.message);
						}
					}
				});
			}
		});

	});

})(jQuery);