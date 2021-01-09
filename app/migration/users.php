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
}


?>