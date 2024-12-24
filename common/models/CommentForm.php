<?php

/**
 * Team: 啊对对队
 * Coding by 高鸿浩 2213411, 20241218
 * 评论php
 */

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * CommentForm is the model behind the comment creation form.
 */
class CommentForm extends Model
{
    public $content;
    public $news_id;
    public $user_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'id'], 'required'],
            [['content'], 'string'],
            [['news_id', 'user_id'], 'integer'],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::class, 'targetAttribute' => ['id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'content' => 'Content',
            'news_id' => 'News ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Creates a new comment based on the provided attributes.
     *
     * @return bool whether the creating new comment was successful and saved.
     */
    public function createComment()
    {
        $comment = new Comments();
    
        // 设置新闻ID（假设Comments表中有id字段）
        $comment->news_id = $this->news_id;
        
        // 设置用户ID（如果用户已登录，则设置；否则可以为null）
        $comment->user_id = !empty($this->user_id) ? $this->user_id : null;

        // 设置评论内容
        $comment->content = $this->content;

        // 设置创建时间戳
        $comment->created_at = date('Y-m-d H:i:s');

        

        return $comment->save(false); // We skip validation here because we've already validated in this model
    }
}