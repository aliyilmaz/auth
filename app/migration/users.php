<?php

/* -------------------------------------------------------------------------- */
/*                                    USERS                                   */
/* -------------------------------------------------------------------------- */
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