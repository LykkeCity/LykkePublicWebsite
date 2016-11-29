<?php
namespace backend\models;

use yii\base\Model;
use common\models\User;


class UpdateUserForm extends Model
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

            ['password', 'string', 'min' => 6, 'message' => 'Некорректный пароль (минимум 6 символов)'],
        ];
    }


    public function upadate($id)
    {
        if (!$this->validate()) {
            return null;
        }

        $user = User::find()->where(['id'=>$id])->one();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->firstname = $this->firstname;
        $user->lastname = $this->lastname;

        if (!empty($this->password)) {
          $user->setPassword($this->password);
          $user->generateAuthKey();
        }

        return $user->save() ? $user : false;
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
