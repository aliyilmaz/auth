<h1>Giriş</h1>
<form action="login" method="post">
<input type="text" name="username" placeholder="Username">
<input type="password" name="password" placeholder="Password">
<button type="submit">GİRİŞ YAP</button>
</form>

<?php
$this->mindLoad('app/request/login');
if(isset($this->post) AND !empty($this->errors)){
    // echo '<div id="errors">hata var</div>';
    foreach ($this->errors as $key => $errors) {
        foreach ($errors as $key => $error) {
            echo '* '.$error;
            echo '<br>';
        } 
    }
}