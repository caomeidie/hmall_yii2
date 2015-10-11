<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sms}}".
 *
 * @property string $sms_id
 * @property string $mobile
 * @property string $sms_type
 * @property integer $sms_status
 * @property string $sms_contents
 * @property string $sms_code
 * @property string $sms_return
 * @property string $sms_send_time
 */
class Sms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sms}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobile', 'sms_type', 'sms_status', 'sms_contents', 'sms_return', 'sms_send_time'], 'required'],
            [['sms_status'], 'integer'],
            [['sms_code'], 'string'],
            [['mobile', 'sms_type'], 'string', 'max' => 20],
            [['sms_contents'], 'string', 'max' => 250],
            [['sms_return', 'sms_send_time'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sms_id' => '信息id',
            'mobile' => '手机号',
            'sms_type' => '发送模板类型：code(验证码), notice(充值通知), deal(消费通知)',
            'sms_status' => '发送状态：1为成功，0为失败',
            'sms_contents' => '信息内容',
            'sms_code' => '验证码，当发送模板为code类型时使用',
            'sms_return' => '发送返回结果',
            'sms_send_time' => '发送时间',
        ];
    }
}
