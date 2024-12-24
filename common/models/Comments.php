<?php

/**
 * Team: 啊对对队
 * Coding by 高鸿浩 2213411, 20241218
 * 评论php
 */

namespace common\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $news_id
 * @property int|null $user_id
 * @property string $content
 * @property string $created_at
 *
 * @property News $news
 * @property User $user
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news_id', 'content'], 'required'],
            [['news_id', 'user_id'], 'integer'],
            [['content'], 'string'],
            [['created_at'], 'safe'],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::class, 'targetAttribute' => ['news_id' => 'news_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'news_id' => 'News ID',
            'user_id' => 'User ID',
            'content' => 'Content',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[News]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::class, ['news_id' => 'news_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
