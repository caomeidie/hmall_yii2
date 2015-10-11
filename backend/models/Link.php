<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%link}}".
 *
 * @property string $link_id
 * @property string $link_title
 * @property string $link_url
 * @property string $link_pic
 * @property integer $link_sort
 */
class Link extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%link}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link_sort'], 'integer'],
            [['link_title', 'link_url', 'link_pic'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'link_id' => '索引id',
            'link_title' => '标题',
            'link_url' => '链接',
            'link_pic' => '图片',
            'link_sort' => '排序',
        ];
    }
}
