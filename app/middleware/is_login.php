<?php

if($this->do_have('users', $_SESSION)){
    $this->redirect('dashboard');
}