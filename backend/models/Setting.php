<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%setting}}".
 *
 * @property string $setting_id
 * @property string $setting_key
 * @property string $setting_val
 * @property string $type_id
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%setting}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['setting_key'], 'required'],
            [['type_id'], 'integer'],
            [['setting_key'], 'string', 'max' => 50],
            [['setting_val'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'setting_id' => 'Setting ID',
            'setting_key' => 'Setting Key',
            'setting_val' => 'Setting Val',
            'type_id' => 'Type ID',
        ];
    }
}
