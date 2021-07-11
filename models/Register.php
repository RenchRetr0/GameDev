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
 */
class Register extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    public $password1;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'email', 'Firstname', 'Name', 'Middle_name', 'password1'], 'required'],
            //[['login'], 'required'],
            
            ['login', 'trim'],
            ['login', 'string', 'min' => 5, 'max' => 20],
            ['login', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Такое логин уже занят.'],

            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Такая почта уже занята.'],

            ['Firstname', 'trim'],
            ['Firstname', 'string', 'min' => 6, 'max' => 20],

            ['Name', 'trim'],
            ['Name', 'string', 'min' => 4, 'max' => 15],

            ['Middle_name', 'trim'],
            ['Middle_name', 'string', 'min' => 6, 'max' => 20],

            [['activ'], 'integer'],
            [['login'], 'string', 'max' => 10],
            [['password', 'email', 'Firstname', 'Name', 'Middle_name'], 'string', 'max' => 255],

            ['password', 'string', 'min' => 10],

            ['password1', 'string', 'min' => 10],

            ['password1', 'compare', 'compareAttribute' => 'password', 'message'=>"Пароли не совпадают"],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
            'password1' => 'Подтвердите пароля',
            'email' => 'Email',
            'Firstname' => 'Фамилия',
            'Name' => 'Имя',
            'Middle_name' => 'Отчество',
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->login = $this->login;
        $user->email = $this->email;
        $user->Firstname = $this->Firstname;
        $user->Name = $this->Name;
        $user->Middle_name = $this->Middle_name;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;

        
        
    }

    public function getRole(){
        $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole('user');
        $auth->assign($authorRole, $user->getId());

        return $auth->save();
    }
}
