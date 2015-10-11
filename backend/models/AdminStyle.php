<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%admin_style}}".
 *
 * @property string $style_id
 * @property string $style_value
 * @property string $roles
 */
class AdminStyle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_style}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['style_value', 'roles'], 'required'],
            [['style_value'], 'string', 'max' => 50],
            [['roles'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'style_id' => 'Style ID',
            'style_value' => 'Style Value',
            'roles' => 'Roles',
        ];
    }
}
