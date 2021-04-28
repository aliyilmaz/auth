<?php

if(isset($_SESSION['user'])){

    if($this->do_have('users', $_SESSION['user'])){
        $this->redirect('dashboard');
    }
    
}