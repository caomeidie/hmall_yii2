<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%goods_type}}".
 *
 * @property string $type_id
 * @property string $type_name
 * @property string $type_spec
 * @property string $type_brand
 * @property string $type_attr
 * @property integer $type_sort
 */
class GoodsType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_name'], 'required'],
            [['type_sort'], 'integer'],
            [['type_name'], 'string', 'max' => 100],
            [['type_spec', 'type_brand', 'type_attr'], 'string', 'max' => 255],
            [['type_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'type_id' => '类型id',
            'type_name' => '类型名称',
            'type_spec' => '类型对应的规格',
            'type_brand' => '类型对应的品牌',
            'type_attr' => '类型对应的属性',
            'type_sort' => '排序',
        ];
    }
}
