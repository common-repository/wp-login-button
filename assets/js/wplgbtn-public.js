jQuery(document).ready(function($) {
	/*magnific popup*/
	$('a.wplgbtn-sign-popup-btn').magnificPopup({

	  mainClass: 'mfp-with-fade my-mfp-zoom-in wplgbtn-popup-block',

	  removalDelay: 200, /*delay removal by X to allow out-animation*/

	  type:'inline',
		callbacks: {
			close: function(){
				$(".wplgbtn-response").removeClass('wplgbtn-error');
				$(".wplgbtn-response").removeClass('wplgbtn-success');
				$(".wplgbtn-response").html('');
            }
        }
	});
	
	/* Perform AJAX login on form submit */
    $('.wplgbtn-submit').on('click', function(e){
    	var form_id = $(this).closest('.wplgbtn-login-form').attr('id');
    	
        var login_redirect_url = $("#"+form_id+" .wpbtn_current_url").val();
    	$("#"+form_id+" .wplgbtn-submit").attr("disabled", "disabled");
    	var form=$("form#"+form_id);    	 
    	var rememberme = false;
    	if($("#"+form_id+" .rememberme").is(':checked')){
    		rememberme = true;
    	}
		var wplgbtn_current_url;	
		$('#'+form_id+' .wplgbtn-response').html('');
		var data = {
				'action'		: 'wplgbtn_ajax_login',
				'data'			: form.serialize(),
				'rememberme' 	: rememberme,
			};
		$.post(Wplgbtn.ajaxurl, data, function(response) {
			var data = $.parseJSON(response);			
            $("#"+form_id+" .wplgbtn-response").html(data.message);           
			if(data.status == true){
          		$("#"+form_id+" .wplgbtn-response").addClass('wplgbtn-success').html(data.message);
				
				window.location.href = login_redirect_url;
           	}
			else if(data.status == false){
            		$("#"+form_id+" .wplgbtn-response").addClass('wplgbtn-error').html(data.message);
           	}
            $("#"+form_id+" .wplgbtn-submit").removeAttr('disabled');
		});
		

    });

    /* Perform AJAX logout */

    $('.wplgbtn-sign-out').on('click', function(e){
    	$(this).attr("disabled", "disabled");
    	var logout_url = $(this).attr('data-url');
    	var data = {
			'action': 'wplgbtn_ajax_logout'			
		};
		$.post(Wplgbtn.ajaxurl, data, function(response) {				
			window.location.href = logout_url;
            $(this).removeAttr('disabled');
		});
    });
});