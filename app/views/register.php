<base href="<?=$this->base_url;?>">
<h1>Kayıt</h1>
<form id="register-form">
<input type="text" name="username" placeholder="Username">
<input type="password" name="password" placeholder="Password" maxlength="10">
<button type="button" id="register-button">KAYIT OL</button>
<strong class="status"></strong>
<div class="messages"></div>
<br><strong class="redirect-time"></strong>
<?=$_SESSION['csrf']['input'];?>
</form>

<script src="public/assets/js/mind.js"></script>
<script>
    hideItem('strong.status, div.messages');
    clickItem('button#register-button', function(e){
        actionPost('api/register', 'form', function(response){
            if(!is_json(response)){
                changeContent('div.messages', '<br><strong style="color:red;">*</strong> '+response);
            } else {
                response = JSON.parse(response);
                let requestStatus 	    = response.status;
                let requestMessages 	= response.messages;
            
                switch (requestStatus) {
                    case 'success':
                        showItem('strong.status');
                        changeContent('strong.status', '<br><br>'+requestMessages);
                        itemSetAttr('button#register-button', 'disabled', 'disabled');
                        redirect('login', 3, 'strong.redirect-time');
                        formReset('form');
                        changeContent('div.messages', '');
                    break;
                    case 'error':
                        showItem('div.messages');
                        changeContent('div.messages', '');
                        itemSetAttr('button#register-button', 'disabled', 'disabled');
                        redirect('register', 5, 'strong.redirect-time');
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
            }
        });
    })
</script>