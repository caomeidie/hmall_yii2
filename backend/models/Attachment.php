<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%attachment}}".
 *
 * @property string $atta_id
 * @property string $related_id
 * @property string $atta_name
 * @property string $atta_thumb
 * @property string $atta_type
 * @property string $add_time
 */
class Attachment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%attachment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['related_id', 'add_time'], 'integer'],
            [['atta_name', 'atta_type'], 'required'],
            [['atta_name', 'atta_thumb', 'atta_type'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'atta_id' => '索引ID',
            'related_id' => '关联ID',
            'atta_name' => '文件名',
            'atta_thumb' => '缩微图片路径',
            'atta_type' => '文件类型',
            'add_time' => '添加时间',
        ];
    }
}
