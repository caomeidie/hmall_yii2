<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%goods_class}}".
 *
 * @property string $gc_id
 * @property string $gc_name
 * @property string $type_id
 * @property string $gc_parent_id
 * @property integer $gc_sort
 * @property integer $gc_show
 */
class GoodsClass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_class}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gc_name', 'type_id'], 'required'],
            [['type_id', 'gc_parent_id', 'gc_sort', 'gc_show'], 'integer'],
            [['gc_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gc_id' => '索引ID',
            'gc_name' => '分类名称',
            'type_id' => '类型id',
            'gc_parent_id' => '父ID',
            'gc_sort' => '排序',
            'gc_show' => '前台显示，0为否，1为是，默认为1',
        ];
    }
}
