<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%store_grade}}".
 *
 * @property string $sg_id
 * @property string $sg_name
 * @property integer $sg_sort
 */
class StoreGrade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%store_grade}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sg_sort'], 'integer'],
            [['sg_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sg_id' => '索引ID',
            'sg_name' => '等级名称',
            'sg_sort' => '级别，数目越大级别越高',
        ];
    }
}
