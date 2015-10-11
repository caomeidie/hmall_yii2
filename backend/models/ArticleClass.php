<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%article_class}}".
 *
 * @property string $ac_id
 * @property string $ac_code
 * @property string $ac_name
 * @property string $ac_parent_id
 * @property integer $ac_sort
 */
class ArticleClass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_class}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ac_name'], 'required'],
            [['ac_parent_id', 'ac_sort'], 'integer'],
            [['ac_code'], 'string', 'max' => 20],
            [['ac_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ac_id' => '索引ID',
            'ac_code' => '分类标识码',
            'ac_name' => '分类名称',
            'ac_parent_id' => '父ID',
            'ac_sort' => '排序',
        ];
    }
}
