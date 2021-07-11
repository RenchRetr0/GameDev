<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $email
 * @property string $Firstname
 * @property string $Name
 * @property string $Middle_name
 * @property int $activ
 * @property string $auth_key
 * @property string $img
 * @property int $status
 */
class Profeli extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'email', 'Firstname', 'Name', 'Middle_name', 'auth_key'], 'required'],
            [['activ', 'status'], 'integer'],
            [['login'], 'string', 'max' => 10],
            [['password', 'email', 'Firstname', 'Name', 'Middle_name', 'img'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Код',
            'login' => 'Логин',
            'password' => 'Пароль',
            'email' => 'Эл. почта',
            'Firstname' => 'Фамлия',
            'Name' => 'Имя',
            'Middle_name' => 'Отчетсво',
            'img' => 'Аватарка',
        ];
    }
}
