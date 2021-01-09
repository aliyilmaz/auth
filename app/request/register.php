<?php

if(!empty($this->post)){

    // Rule
    $rule = array(
        'username'          =>  'required|unique:users',
        'password'          =>  'required|min-char:6|max-char:10'
    );

    // Message
    $message = array(
        'username'=>  array(
            'required'=>'Kullanıcı adı belirtmeniz gerekmektedir.',
            'unique'=>'Başka bir kullanıcı adı belirtmeniz gerekmektedir.'
        ),        
        'password'=>  array(
            'required'=>'Parola belirtmeniz gerekmektedir.',
            'min-char'=>'Minumum 6 karakter uzunluğunda bir parola belirtilmelidir.',
            'max-char'=>'Maksimum 10 karakter uzunluğunda bir parola belirtilmelidir.'
        )
    );

    if($this->validate($rule, $this->post, $message)){
        if($this->insert('users', $this->post)){
            echo 'Kayıt olduğunuz için teşekkür ederiz.';
        } else {
            echo 'Kayıt işleminiz başarısızlıkla sonuçlandı.';
        }
    } 
}

?>