<?php

/**
 * Team: 啊对对队
 * Coding by 蔡鸿 2212989, 20241216
 * AI产业及其市场份额占比php
 */

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "Market".
 */
class Market extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        // 返回您的表名
        return 'Market';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        // 根据您的实际字段添加验证规则
        return [
            [['Category', 'Subcategory', 'Value', 'Label'], 'required'],
            [['Value'], 'number'],
            [['Category', 'Subcategory', 'Label'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        // 根据您的实际字段添加标签
        return [
            'Category' => 'Category',
            'Subcategory' => 'Subcategory',
            'Value' => 'Value',
            'Label' => 'Label',
        ];
    }
}