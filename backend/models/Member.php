<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%member}}".
 *
 * @property string $member_id
 * @property string $member_name
 * @property string $member_passwd
 * @property string $member_truename
 * @property string $member_idcard
 * @property string $member_mobile
 * @property string $member_avatar
 * @property integer $member_sex
 * @property string $member_birthday
 * @property string $member_email
 * @property string $member_login_num
 * @property string $member_addtime
 * @property string $member_logintime
 * @property string $member_old_logintime
 * @property string $member_loginip
 * @property string $member_old_loginip
 * @property integer $member_points
 * @property integer $member_state
 * @property integer $member_areaid
 * @property integer $member_cityid
 * @property integer $member_provinceid
 * @property string $member_areainfo
 * @property integer $member_vip
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_passwd', 'member_mobile'], 'required'],
            [['member_sex', 'member_login_num', 'member_points', 'member_state', 'member_areaid', 'member_cityid', 'member_provinceid', 'member_vip'], 'integer'],
            [['member_birthday'], 'safe'],
            [['member_name', 'member_avatar'], 'string', 'max' => 50],
            [['member_passwd'], 'string', 'max' => 64],
            [['member_truename', 'member_idcard', 'member_mobile', 'member_loginip', 'member_old_loginip'], 'string', 'max' => 20],
            [['member_email'], 'string', 'max' => 100],
            [['member_addtime', 'member_logintime', 'member_old_logintime'], 'string', 'max' => 10],
            [['member_areainfo'], 'string', 'max' => 255],
            [['member_name', 'member_mobile'], 'unique', 'targetAttribute' => ['member_name', 'member_mobile'], 'message' => 'The combination of 会员名称 and 会员手机 has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'member_id' => '会员id',
            'member_name' => '会员名称',
            'member_passwd' => '会员密码',
            'member_truename' => '真实姓名',
            'member_idcard' => '身份证',
            'member_mobile' => '会员手机',
            'member_avatar' => '会员头像',
            'member_sex' => '会员性别:0保密，1男，2女',
            'member_birthday' => '生日',
            'member_email' => '会员邮箱',
            'member_login_num' => '登录次数',
            'member_addtime' => '会员注册时间',
            'member_logintime' => '当前登录时间',
            'member_old_logintime' => '上次登录时间',
            'member_loginip' => '当前登录ip',
            'member_old_loginip' => '上次登录ip',
            'member_points' => '会员积分',
            'member_state' => '会员的开启状态 1为开启 0为关闭',
            'member_areaid' => '地区ID',
            'member_cityid' => '城市ID',
            'member_provinceid' => '省份ID',
            'member_areainfo' => '地区内容',
            'member_vip' => '是否是vip：0不是，1是',
        ];
    }
}
