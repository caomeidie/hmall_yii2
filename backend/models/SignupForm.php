<?php
namespace app\models;

use app\models\Admin;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $admin_name;
    public $email;
    public $password;
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['admin_name', 'filter', 'filter' => 'trim'],
            ['admin_name', 'required'],
            ['admin_name', 'unique', 'targetClass' => 'app\models\Admin', 'message' => 'This admin_name has already been taken.'],
            ['admin_name', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'app\models\Admin', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            
            ['verifyCode', 'required'],
        ];
    }

    /**
     * Signs admin up.
     *
     * @return Admin|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            return "bbbbbbbbbbbbbb";
            $admin = new Admin();
            var_dump($admin);
            $admin->admin_name = $this->admin_name;
            $admin->email = $this->email;
            return "aaaaaaaaaaaaaaaaa";
            $admin->setPassword($this->password);
            $admin->generateAuthKey();
            if ($admin->save()) {
                return "aaaaaaaaaaaaaaaaa";
                return $admin;
            }
            return "ccccccccccccccccccc";
        }

        return null;
    }
}
