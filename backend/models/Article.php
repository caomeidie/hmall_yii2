<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property integer $article_id
 * @property string $ac_id
 * @property string $article_url
 * @property integer $article_show
 * @property integer $article_sort
 * @property string $article_title
 * @property string $article_content
 * @property string $article_time
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ac_id', 'article_show', 'article_sort', 'article_time'], 'integer'],
            [['article_title'], 'required'],
            [['article_content'], 'string'],
            [['article_url', 'article_title'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'article_id' => '索引id',
            'ac_id' => '分类id',
            'article_url' => '跳转链接',
            'article_show' => '是否显示，0为否，1为是，默认为1',
            'article_sort' => '排序',
            'article_title' => '标题',
            'article_content' => '内容',
            'article_time' => '发布时间',
        ];
    }
}
