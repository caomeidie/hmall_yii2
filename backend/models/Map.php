<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%map}}".
 *
 * @property integer $map_id
 * @property integer $member_id
 * @property string $member_name
 * @property integer $area_id
 * @property string $area_info
 * @property string $address
 * @property double $point_lng
 * @property double $point_lat
 * @property string $store_name
 * @property integer $store_id
 * @property string $map_api
 */
class Map extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%map}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'member_name', 'area_id', 'area_info'], 'required'],
            [['member_id', 'area_id', 'store_id'], 'integer'],
            [['point_lng', 'point_lat'], 'number'],
            [['member_name', 'store_name'], 'string', 'max' => 20],
            [['area_info', 'address'], 'string', 'max' => 50],
            [['map_api'], 'string', 'max' => 9]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'map_id' => '地图ID',
            'member_id' => '会员ID',
            'member_name' => '会员名称',
            'area_id' => '地区ID',
            'area_info' => '地区内容',
            'address' => '地址',
            'point_lng' => '地理经度',
            'point_lat' => '地理纬度',
            'store_name' => '餐厅名称',
            'store_id' => '餐厅ID',
            'map_api' => '地图API(暂时只有baidu)',
        ];
    }
}
