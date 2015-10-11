<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%recommend}}".
 *
 * @property string $recommend_id
 * @property string $recommend_name
 * @property string $recommend_code
 * @property string $recommend_desc
 * @property string $recommend_config
 */
class Recommend extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%recommend}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recommend_code', 'recommend_desc'], 'required'],
            [['recommend_name'], 'string', 'max' => 50],
            [['recommend_code', 'recommend_desc', 'recommend_config'], 'string', 'max' => 255],
            [['recommend_code'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recommend_id' => '索引ID',
            'recommend_name' => '名称',
            'recommend_code' => '推荐标识码',
            'recommend_desc' => '推荐描述',
            'recommend_config' => '配置信息',
        ];
    }
}
