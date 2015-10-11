<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


/**
 * This is the model class for table "{{%hm_admin}}".
 *
 * @property string $admin_id
 * @property string $admin_name
 * @property string $password
 * @property string $email
 * @property string $phone
 * @property string $addtime
 * @property string $updatetime
 * @property integer $logintimes
 * @property string $lastip
 * @property string $status
 * @property string $style_id
 * @property string $password_hash
 * @property string $password_reset_token
 */
class Admin extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin}}';
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_name', 'password'], 'required'],
            [['logintimes', 'status', 'style_id'], 'integer'],
            [['admin_name', 'email', 'phone'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 64],
            [['addtime', 'updatetime', 'lastip'], 'string', 'max' => 20],
            [['admin_name', 'phone'], 'unique', 'targetAttribute' => ['admin_name', 'phone'], 'message' => 'The combination of Admin Name and Phone has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => 'Admin ID',
            'admin_name' => 'Admin Name',
            'password' => 'Password',
            'email' => 'Email',
            'phone' => 'Phone',
            'addtime' => 'Addtime',
            'updatetime' => 'Updatetime',
            'logintimes' => 'Logintimes',
            'lastip' => 'Lastip',
            'status' => 'Status',
            'style_id' => 'Style ID',
        ];
    }
    
    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return [
                'AdminStyle'=>[self::BELONGS_TO, 'AdminStyle', 'style_id'],
        ];
    }
    
    /**
     * Finds admin by adminname
     *
     * @param string $adminname
     * @return static|null
     */
    public static function findByAdminname($adminname)
    {
        return static::findOne(['admin_name' => $adminname, 'status' => self::STATUS_ACTIVE]);
    }
        
    /**
     * Get admin by condition
     * @param array $condition(二维数组：array(key=>array(operator, valuea)))
     * @param string $order
     * @param string $limit
     *
     * @return array
     */
    public function adminList($condition, $order='addtime DESC', $limit=null, $offset=null){
        $cond = "";
        foreach($condition as $key=>$value){
            $cond .= $key.$value[0].':'.$key;
            if(current($condition) != end($condition))
                $cond .= ' AND ';
            $param[':'.$key] = $value[1];
        }
         
        $arr = array(
                'condition'=>$cond,
                'params'=>$param,
                'order'=>$order,
        );
         
        $arr = $limit ? array_merge($arr, ['limit'=>$limit]) : $arr;
        $arr = $limit && $offset ? array_merge($arr, array('offset'=>$offset)) : $arr;
    
        return $this->findAll($arr);
    }
    
    /**
     * Count admin's number
     * @param array $condition(二维数组：array(key=>array(operator, valuea)))
     */
    public function adminCount($condition){
        $cond = "";
        foreach($condition as $key=>$value){
            $cond .= $key.$value[0].':'.$key;
            if(current($condition) != end($condition))
                $cond .= ' AND ';
            $param[':'.$key] = $value[1];
        }
    
        $arr = array(
                'condition'=>$cond,
                'params'=>$param,
        );
    
        return $this->count($arr);
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
        
    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }
    
        return static::findOne([
                'password_reset_token' => $token,
                'status' => self::STATUS_ACTIVE,
                ]);
    }
    
    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
    
        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }
    
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }
    
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    
    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    
    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
