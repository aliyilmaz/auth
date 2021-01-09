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
            'required'=>'Kullanıcı adı belirtmeniz gerekmektedir.'
        ),        
        'password'=>  array(
            'required'=>'Parola belirtmeniz gerekmektedir.',
            'min-char'=>'Minumum 6 karakter uzunluğunda bir parola belirtilmelidir.',
            'max-char'=>'Maksimum 10 karakter uzunluğunda bir parola belirtilmelidir.'
        )
    );

    if($this->validate($rule, $this->post, $message)){

        $this->post['password'] = md5($this->post['password']);

        $user = $this->theodore('users', $this->post);
        if(!empty($user)){

            if($user['status']){
                $_SESSION['username'] = $user['username'];
                echo 'Oturum açılıyor. <h5 id="redirect-time"></h5>';
                $this->redirect('dashboard', 10, 'h5#redirect-time');
            } else {
                echo 'Hesabınız dondurulduğu için oturum açmanıza izin veremeyiz.';
            }
        } else {
            echo 'Bu isimde bir kullanıcı bulunmamaktadır.';
        }
    } 
}

?>