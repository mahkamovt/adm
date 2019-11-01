<?php

namespace app\models;

?>


    <?php

class SignupForm extends Model
{

    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['username', 'password', 'email'], 'required', 'message' => 'Заполните поле !'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'email' => 'E-mail',
            'password' => 'Пароль',
        ];
    }

}
