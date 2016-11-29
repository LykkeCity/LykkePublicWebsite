<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $firstname;
    public $lastname;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Укажите логин (от 2 до 10 символов)'],
            ['username', 'string', 'min' => 2, 'max' => 10],

            ['firstname', 'trim'],
            ['firstname', 'required', 'message' => 'Укажите Имя (минимум 2 символа)' ],
            ['firstname', 'string', 'min' => 2, 'max' => 255],

            ['lastname', 'trim'],
            ['lastname', 'required', 'message' => 'Укажите Фамилию (минимум 2 символа)' ],
            ['lastname', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Некорректный Email'],

            ['password', 'required','message' => 'Некорректный пароль (минимум 6 символов)'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->firstname = $this->firstname;
        $user->lastname = $this->lastname;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }


    public function attributeLabels() {
      return [
        'firstname' => 'Имя',
        'lastname'  => 'Фамилия',
        'username'  => 'Логин',
        'email'     => 'Email',
        'password'  => 'Пароль'
      ];
    }
}
