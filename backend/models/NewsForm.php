<?php

/**
 * Team: 啊对对队
 * Coding by 高鸿浩 2213411, 20241220
 * 后台模块php
 */

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\News;

/**
 * Signup form
 */
class NewsForm extends News
{
    public $title;
    public $abstract;
    public $context;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // 标题是必填项，并且长度限制在2到65535个字符之间（text 类型的最大长度）
            [['title'], 'required'],
            [['title'], 'string', 'min' => 2, 'max' => 65535],

            // 摘要是必填项，并且长度限制在10到65535个字符之间
            [['abstract'], 'required'],
            [['abstract'], 'string', 'min' => 10, 'max' => 65535],

            // 内容是必填项，没有最大长度限制（或者根据需求设置）
            [['context'], 'required'],
            [['context'], 'string'],

            // 如果需要，可以添加更多的验证规则，例如格式、唯一性等
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function add()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $news = new News();
        $news->title = $this->title;
        $news->abstract = $this->abstract;
        $news->context = $this->context;

        return $news->save();
    }

}
