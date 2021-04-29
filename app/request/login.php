<?php

$response = [];

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
        'min-char'=>'Parolanız minumum 6 karakter uzunluğunda olmalıdır.',
        'max-char'=>'Parolanız maksimum 10 karakter uzunluğunda olmalıdır.'
    )
);

if($this->validate($rule, $this->post, $message)){

    $this->post['password'] = md5($this->post['password']);

    $user = $this->theodore('users', $this->post);
    if(!empty($user)){

        if($user['status']){
            $_SESSION['username'] = $user['username'];
            $response = array(
                'status'=>'success',
                'messages'=>'Oturum açılıyor.'
            );
        } else {
            $response = array(
                'status'=>'error',
                'messages'=>'Hesabınız dondurulduğu için oturum açmanıza izin veremeyiz.'
            );
        }
    } else {
        $response = array(
            'status'=>'error',
            'messages'=>'Bu bilgilere sahip bir kullanıcı bulunmamaktadır.'
        );
    }
} else {
    $response = array(
        'status'=>'error',
        'messages'=>$this->errors
    );
}
echo json_encode($response);
?>