<base href="<?=$this->base_url;?>">
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="public/assets/js/custom.js"></script>