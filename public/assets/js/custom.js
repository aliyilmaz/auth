window.addEventListener('load', (event) => {

    $('button#login-button').on('click', function(){
        let form = $('form#login-form');
        form.find('.status').html('');
        $.post('api/login', form.serializeArray(), function(response){

			response 	        = JSON.parse(response);
			requestStatus 	    = response.status;
			requestMessages 	= response.messages;

            switch (requestStatus) {
                case 'success':
                    form.find('.status').html(requestMessages).show();
                    form.trigger('reset');
                    setTimeout(() => {
                        window.location = 'dashboard';
                    }, 1000);
                break;
                case 'error':
                    if( Object.prototype.toString.call(requestMessages) == '[object String]' ) {
						form.find('.status').append('<strong style="color:red;">*</strong> '+requestMessages+'<br />').show();
					} else {
						$.each( requestMessages, function( name, values ) {
							$.each( values, function( rule, value ) {
								form.find('.status').append('<strong style="color:red;">*</strong> '+value+'<br />').show();
							});
	
						});
					}
                break;
            }

        });
    });

    $('button#register-button').on('click', function(){
        let form = $('form#register-form');
        form.find('.status').html('');
        $.post('api/register', form.serializeArray(), function(response){

			response 	        = JSON.parse(response);
			requestStatus 	    = response.status;
			requestMessages 	= response.messages;

            switch (requestStatus) {
                case 'success':
                    form.find('.status').html(requestMessages).show();
                    form.trigger('reset');
                break;
                case 'error':
                    if( Object.prototype.toString.call(requestMessages) == '[object String]' ) {
						form.find('.status').append('<strong style="color:red;">*</strong> '+requestMessages+'<br />').show();
					} else {
						$.each( requestMessages, function( name, values ) {
							$.each( values, function( rule, value ) {
								form.find('.status').append('<strong style="color:red;">*</strong> '+value+'<br />').show();
							});
	
						});
					}
                break;
            }

        });
    });

    
});