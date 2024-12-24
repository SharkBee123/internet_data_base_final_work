<?php

/**
 * Team: 啊对对队
 * Coding by 匡俊霖 2212565, 20241217
 * AI历史发展进程php
 */

namespace common\models;

use Yii;

/**
 * This is the model class for table "ai_history".
 *
 * @property int $id
 * @property int $year
 * @property string $event_description
 */
class AiHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ai_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year', 'event_description'], 'required'],
            [['year'], 'integer'],
            [['event_description'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'year' => 'Year',
            'event_description' => 'Event Description',
        ];
    }
}
