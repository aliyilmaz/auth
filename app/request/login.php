<?php

if(!empty($this->post)){

    // Rule
    $rule = array(
        'username'          =>  'required',
        'password'          =>  'required|min-char:6|max-char:10'
    );

    // Message
    $message = array(
        'username'=>  array(
            'required'=>'Boş bırakılmamalıdır.'
        ),        
        'password'=>  array(
            'required'=>'Parola belirtmeniz gerekmektedir.',
            'min-char'=>'Minumum 6 karakter uzunluğunda bir parola belirtilmelidir.',
            'max-char'=>'Maksimum 10 karakter uzunluğunda bir parola belirtilmelidir.'
        )
    );

    if($this->validate($rule, $this->post, $message)){

        $user = $this->theodore('users', $this->post);
        if(!empty($user)){
            $_SESSION['username'] = $user['username'];
            echo 'Oturum açılıyor. <h5 id="redirect-time"></h5>';
            $this->redirect('dashboard', 10, 'h5#redirect-time');
        } else {
            echo 'Giriş işleminiz başarısızlıkla sonuçlandı.';
        }
    } 
}

?>