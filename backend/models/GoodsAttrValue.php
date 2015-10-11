<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%goods_attr_value}}".
 *
 * @property string $avalue_id
 * @property string $goods_id
 * @property string $attr_id
 * @property string $attr_value
 */
class GoodsAttrValue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_attr_value}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id', 'attr_id', 'attr_value'], 'required'],
            [['goods_id', 'attr_id'], 'integer'],
            [['attr_value'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'avalue_id' => 'Avalue ID',
            'goods_id' => 'Goods ID',
            'attr_id' => 'Attr ID',
            'attr_value' => 'Attr Value',
        ];
    }
}
