<?php

/**
 * Team: 啊对对队
 * Coding by 马有朝 2211631, 20241217
 * 新闻php
 */

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id 新闻id号
 * @property string $title 新闻标题
 * @property string $abstract 新闻摘要
 * @property string $context 新闻内容
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
    */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'title', 'abstract', 'context'], 'required'],
            [['id'], 'integer'],
            [['title', 'abstract', 'context'], 'string'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'News ID',
            'title' => 'Title',
            'abstract' => 'Abstract',
            'context' => 'Context',
        ];
    }
    
}
