<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%goods_spec}}".
 *
 * @property string $spec_id
 * @property string $spec_name
 * @property string $spec_value
 * @property string $spec_type
 * @property integer $spec_sort
 */
class GoodsSpec extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_spec}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['spec_name', 'spec_value'], 'required'],
            [['spec_type', 'spec_sort'], 'integer'],
            [['spec_name', 'spec_value'], 'string', 'max' => 255],
            [['spec_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'spec_id' => '商品规格索引id',
            'spec_name' => '规格名称',
            'spec_value' => '规格值',
            'spec_type' => '规格类型：0系统自带，不可删除；1：用户添加，可删除',
            'spec_sort' => '规格索引',
        ];
    }
}
