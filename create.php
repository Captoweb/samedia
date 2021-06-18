<?php require_once('init.php'); ?> 
<?php
if(Input::exists()) {

    $validate = new Validate();

    $validation = $validate->check($_POST, [
        'name' => [
            'required' => true,
            'min' => 2,
            'max' => 15,
            'unique' => 'users'
        ],
        'password' => [
            'required' => true,
            'min' => 3
        ],
        'password_confirm' => [
            'required' => true,
            'matches' => 'password'
        ],
    ]);

    if($validation->passed()) {
        echo 'валидация успешно прошла';
    } else {
        foreach($validation->errors() as $error) { // тут ошибка
            echo $error . "<br>";
        }
    }

    $user = new User;
    $user->create([
        "name" => Input::get('name'),
        "email" => Input::get('email'),
        "password" => Input::get('password'),
        // "password" => password_hash(Input::get('password'),PASSWORD_DEFAULT),
    ]);

}
header('Location: /index.php');

