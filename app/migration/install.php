<?php

/* -------------------------------------------------------------------------- */
/*                                  DB CREATE                                 */
/* -------------------------------------------------------------------------- */
if(!$this->is_db($this->dbname)){
    $this->dbCreate($this->dbname);
    $this->redirect($this->page_current);
}

/* -------------------------------------------------------------------------- */
/*                                TABLE CREATE                                */
/* -------------------------------------------------------------------------- */
$this->mindLoad(array(
    'app/migration/users'
));

?>