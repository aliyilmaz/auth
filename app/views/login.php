<h1>Giriş</h1>
<form id="login-form">
<input type="text" name="username" placeholder="Username">
<input type="password" name="password" placeholder="Password" maxlength="10">
<button type="button" id="login-button">GİRİŞ YAP</button>
<h4 class="status"></h4>
</form>


<style>
h4.status{
    display:none;
}
</style>
<script>
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

    
});
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>