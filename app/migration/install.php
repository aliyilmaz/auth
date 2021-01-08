<?php

if(!$this->is_db($this->dbname)){
    $this->dbCreate($this->dbname);
    $this->redirect($this->page_current);
}

$scheme = array(
    'id:increment',
    'username',
    'password',
    'created_at',
    'updated_at'
);

if(!$this->is_table('users')){
    $this->tableCreate('users', $scheme);
}

?>