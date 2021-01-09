<h1>Kayıt</h1>
<form id="register-form">
<input type="text" name="username" placeholder="Username">
<input type="password" name="password" placeholder="Password">
<button type="button" id="register-button">KAYIT OL</button>
<h4 class="status"></h4>
</form>


<style>
h4.status{
    display:none;
}
</style>
<script>
window.addEventListener('load', (event) => {

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
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>