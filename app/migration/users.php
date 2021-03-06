<?php

/* -------------------------------------------------------------------------- */
/*                                    USERS                                   */
/* -------------------------------------------------------------------------- */
$scheme = array(
    'id:increments',
    'username',
    'password',
    'status',
    'created_at',
    'updated_at'
);

if(!$this->is_table('users')){
    $this->tableCreate('users', $scheme);

    /* -------------------------------------------------------------------------- */
    /*                                  USER ADD                                  */
    /* -------------------------------------------------------------------------- */
    $info = array(
        'username'=>'aliyilmaz',
        'password'=>md5(123456),
        'status'=>1,
        'created_at'=>$this->timestamp
    );
    $this->insert('users', $info);
    
    /* -------------------------------------------------------------------------- */
    /*                             LOGIN PAGE REDIRECT                            */
    /* -------------------------------------------------------------------------- */
    $this->redirect('login');
}



?>