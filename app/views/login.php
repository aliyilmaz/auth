<?=$this->mindLoad('app/middleware/is_login');?>
<base href="<?=$this->base_url;?>">
<h1>Giriş</h1>
<form id="login-form">
<input type="text" name="username" placeholder="Username">
<input type="password" name="password" placeholder="Password" maxlength="10">
<button type="button" id="login-button">GİRİŞ YAP</button>
<strong class="status"></strong> 
<div class="messages"></div>
<br><strong class="redirect-time"></strong>
<?=$this->csrf_token();?>
</form>

<script src="public/assets/js/mind.js"></script>
<script>
    hideItem('strong.status, div.messages');
    clickItem('button#login-button', function(e){
        actionPost('api/login', 'form', function(response){
            response = JSON.parse(response);
            let requestStatus 	    = response.status;
			let requestMessages 	= response.messages;
           
            switch (requestStatus) {
                case 'success':
                    showItem('strong.status');
                    changeContent('strong.status', '<br><br>'+requestMessages);
                    redirect('dashboard', 3, 'strong.redirect-time');
                    formReset('form');
                    changeContent('div.messages', '');
                break;
                case 'error':
                    showItem('div.messages');
                    changeContent('div.messages', '');
                    itemSetAttr('button#login-button', 'disabled', 'disabled');
                    redirect('login', 3, 'strong.redirect-time');
                    if(is_object(requestMessages)){
                        foreachArray(requestMessages, (name, values)=>{
                            foreachArray(values, (rule, value)=>{
                                appendItem('div.messages', '<br><strong style="color:red;">*</strong> '+value);
                            });
                        })
                    } else {
                        appendItem('div.messages', '<br><strong style="color:red;">*</strong> '+requestMessages);
                    }
                    
                break;
            }
        });
    })
</script>