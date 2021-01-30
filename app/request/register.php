<?php

$response = [];

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
    
    $values = array(
        'username'=>$this->post['username'],
        'password'=>md5($this->post['password']),
        'status'=>1,
        'created_at'=>$this->timestamp
    );

    if($this->insert('users', $values)){
        $response = array(
            'status' => 'success',
            'messages' => 'Kayıt olduğunuz için teşekkür ederiz.'
        );
    } else {
        $response = array(
            'status' => 'error',
            'messages' => 'Kayıt işleminiz başarısızlıkla sonuçlandı.'
        );
    }
} else {
    $response = array(
        'status' => 'error',
        'messages' => $this->errors
    );
} 

echo json_encode($response);

?>