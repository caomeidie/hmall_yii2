<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%goods_spec_value}}".
 *
 * @property string $svalue_id
 * @property string $goods_id
 * @property string $spec_goods_seri
 * @property string $spec_goods_price
 * @property integer $spec_goods_storage
 * @property integer $spec_salenum
 */
class GoodsSpecValue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_spec_value}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id', 'spec_goods_seri', 'spec_goods_price'], 'required'],
            [['goods_id', 'spec_goods_storage', 'spec_salenum'], 'integer'],
            [['spec_goods_seri'], 'string'],
            [['spec_goods_price'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'svalue_id' => 'Svalue ID',
            'goods_id' => '商品id',
            'spec_goods_seri' => '商品规格序列化',
            'spec_goods_price' => '规格商品价格',
            'spec_goods_storage' => '规格商品库存',
            'spec_salenum' => '订出数量',
        ];
    }
}
