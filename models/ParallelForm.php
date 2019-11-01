<?php

namespace app\models;

use yii\db\ActiveRecord;

class ParallelForm extends ActiveRecord
{

    public static function tableName()
    {
        return 'post';

    }
//public $name;
//public $email;
//public $text;

    public function attributeLabels()
    {
        return [

            'name' => 'Имя',
            'email' => 'Почта',
            'text' => 'Текст сообщения',

        ];
    }


    public function rules()
    {

        return [

            [['name', 'text'], 'required'],
            ['email', 'email'],
//['name','string','min'=>2, 'tooShort'=>'Слишком короткое имя'],
//['name','string','max'=>7, 'tooLong'=>'Слишком длинное имя'],
//['name','string','length'=>[2,5]],
            ['text', 'trim'],
        ];
    }

}