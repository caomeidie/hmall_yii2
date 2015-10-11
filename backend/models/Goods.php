<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%goods}}".
 *
 * @property string $goods_id
 * @property string $goods_name
 * @property string $gc_id
 * @property string $brand_id
 * @property integer $goods_num
 * @property integer $spec_open
 * @property integer $attr_open
 * @property string $goods_image
 * @property string $goods_price
 * @property string $goods_max_price
 * @property string $goods_min_price
 * @property integer $goods_storage
 * @property integer $goods_show
 * @property integer $goods_status
 * @property integer $goods_recommend
 * @property string $goods_add_time
 * @property string $goods_starttime
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_name', 'gc_id', 'goods_show'], 'required'],
            [['gc_id', 'brand_id', 'goods_num', 'spec_open', 'attr_open', 'goods_storage', 'goods_show', 'goods_status', 'goods_recommend', 'goods_add_time', 'goods_starttime'], 'integer'],
            [['goods_price', 'goods_max_price', 'goods_min_price'], 'number'],
            [['goods_name', 'goods_image'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'goods_id' => '商品索引id',
            'goods_name' => '商品名称',
            'gc_id' => '商品分类id',
            'brand_id' => '商品品牌id',
            'goods_num' => '商品货号',
            'spec_open' => '商品规格开启状态，1开启，0关闭',
            'attr_open' => '商品属性开启状态，1开启，0关闭',
            'goods_image' => '商品默认封面图片',
            'goods_price' => '商品价格',
            'goods_max_price' => '商品最高价格',
            'goods_min_price' => '商品最低价格',
            'goods_storage' => '商品库存',
            'goods_show' => '商品上架',
            'goods_status' => '商品状态，1开启，0违规下架',
            'goods_recommend' => '商品推荐，1推荐，0不推荐',
            'goods_add_time' => '商品添加时间',
            'goods_starttime' => '发布开始时间',
        ];
    }
}
