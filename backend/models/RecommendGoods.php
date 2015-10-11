<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%recommend_goods}}".
 *
 * @property string $recommend_id
 * @property string $goods_id
 * @property integer $sort
 */
class RecommendGoods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%recommend_goods}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recommend_id', 'goods_id'], 'required'],
            [['recommend_id', 'goods_id', 'sort'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recommend_id' => '推荐ID',
            'goods_id' => '商品ID',
            'sort' => '排序',
        ];
    }
}
