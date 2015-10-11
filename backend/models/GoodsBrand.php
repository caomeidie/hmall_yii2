<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%goods_brand}}".
 *
 * @property string $brand_id
 * @property string $brand_name
 * @property integer $brand_type
 * @property string $brand_pic
 * @property integer $brand_sort
 */
class GoodsBrand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_brand}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand_name'], 'required'],
            [['brand_type', 'brand_sort'], 'integer'],
            [['brand_name', 'brand_pic'], 'string', 'max' => 100],
            [['brand_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'brand_id' => '索引ID',
            'brand_name' => '品牌名称',
            'brand_type' => '品牌类型：0文字，1图片',
            'brand_pic' => '图片',
            'brand_sort' => '排序',
        ];
    }
}
