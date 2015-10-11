<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%goods_attr}}".
 *
 * @property string $attr_id
 * @property string $attr_name
 * @property string $attr_value
 * @property integer $attr_sort
 */
class GoodsAttr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_attr}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attr_name', 'attr_value'], 'required'],
            [['attr_sort'], 'integer'],
            [['attr_name'], 'string', 'max' => 100],
            [['attr_value'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'attr_id' => 'Attr ID',
            'attr_name' => 'Attr Name',
            'attr_value' => 'Attr Value',
            'attr_sort' => 'Attr Sort',
        ];
    }
}
