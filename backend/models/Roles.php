<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%roles}}".
 *
 * @property string $role_id
 * @property string $role_value
 * @property string $action
 * @property string $role_desc
 * @property string $parent_role_id
 * @property string $related_role_id
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%roles}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_value', 'parent_role_id'], 'required'],
            [['parent_role_id', 'related_role_id'], 'integer'],
            [['role_value'], 'string', 'max' => 150],
            [['action', 'role_desc'], 'string', 'max' => 765]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'role_value' => 'Role Value',
            'action' => 'Action',
            'role_desc' => 'Role Desc',
            'parent_role_id' => 'Parent Role ID',
            'related_role_id' => 'Related Role ID',
        ];
    }
}
