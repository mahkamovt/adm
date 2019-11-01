<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{

    /**
     * Подключаем нашу БД
     **/
    public static function tableName()
    {

        return 'user';
    }

    /**
     * Возвращает найденного пользователя по его id
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        //  return static::findOne(['access_token' => $token]);
    }

    /**
     * Ищем пользователя по его Логину
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Получаем id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Получаем ключ авторизации
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        //  return $this->password === $password;
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * Генерация ключа авторизации
     */

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
}
