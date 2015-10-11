<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%address}}".
 *
 * @property string $address_id
 * @property string $member_id
 * @property string $true_name
 * @property string $area_id
 * @property integer $city_id
 * @property string $area_info
 * @property string $address
 * @property string $zip_code
 * @property string $tel_phone
 * @property string $mob_phone
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%address}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'area_id', 'city_id'], 'integer'],
            [['true_name', 'address'], 'required'],
            [['true_name'], 'string', 'max' => 50],
            [['area_info', 'address'], 'string', 'max' => 255],
            [['zip_code'], 'string', 'max' => 6],
            [['tel_phone'], 'string', 'max' => 20],
            [['mob_phone'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'address_id' => '地址ID',
            'member_id' => '会员ID',
            'true_name' => '会员姓名',
            'area_id' => '地区ID',
            'city_id' => '市级ID',
            'area_info' => '地区内容',
            'address' => '地址',
            'zip_code' => '邮编',
            'tel_phone' => '座机电话',
            'mob_phone' => '手机电话',
        ];
    }
}
