<?php
namespace app\models;
use Yii;
use yii\base\Model;
/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * admin login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends Model
{
	public $admin_name;
	public $password;
	public $rememberMe = true;
	public $verifyCode;

	private $_identity;
	private $_admin;

	/**
	 * Declares the validation rules.
	 * The rules state that admin_name and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return [    		
    		[['admin_name', 'password', 'verifyCode'], 'required'],
    		// rememberMe must be a boolean value
    		['rememberMe', 'boolean'],
    		// password is validated by validatePassword()
    		['password', 'validatePassword'],
		];
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
		    'admin_name'=>'用户名',
		    'password'=>'密码',
			'rememberMe'=>'记住我',
		    'verifyCode' =>'验证码',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->admin_name,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','用户密码有误！.');
		}
	}

	/**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getAdmin();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect admin_name or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided admin_name and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getAdmin(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds admin by [[admin_name]]
     *
     * @return Admin|null
     */
    protected function getAdmin()
    {
        if ($this->_admin === null) {
            $this->_admin = Admin::findByAdminname($this->admin_name);
        }

        return $this->_admin;
    }
}
