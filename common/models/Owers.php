<?php

/**
 * Team: 啊对对队
 * Coding by 马有朝 2211631, 20241217
 * 团队成员php
 */

namespace common\models;

use Yii;

/**
 * This is the model class for table "owers".
 *
 * @property int $id
 * @property string $name
 * @property string $number
 * @property string $major
 * @property string $message
 */
class Owers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'owers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'number', 'major', 'message'], 'required'],
            [['id'], 'integer'],
            [['message'], 'string'],
            [['name', 'major'], 'string', 'max' => 255],
            [['number'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'number' => 'Number',
            'major' => 'Major',
            'message' => 'Message',
        ];
    }
}
