<?php 

if(!$this->do_have('users', $_SESSION['user'])){
    $this->redirect('login');
}