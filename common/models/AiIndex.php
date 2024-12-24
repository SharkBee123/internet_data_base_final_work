<?php

/**
 * Team: 啊对对队
 * Coding by 匡俊霖 2212565, 20241217
 * 五大国人工智能各领域投入php
 */


namespace common\models;

use Yii;
use yii\db\ActiveRecord;  // 引入 ActiveRecord 类

/**
 * This is the model class for table "AI_index".
 *
 * @property int $id
 * @property string $Country
 * @property float $Talent
 * @property float $Infrastructure
 * @property float $Operating_Environment
 * @property float $Research
 * @property float $Development
 * @property float $Government_Strategy
 * @property float $Commercial
 * @property float $Total_score
 * @property string $Region
 * @property string $Cluster
 * @property string $Income_group
 * @property string $Political_regime
 */
class AiIndex extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'AI_index';  // 返回表名
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Country', 'Region', 'Cluster', 'Income_group', 'Political_regime'], 'string'],
            [['Talent', 'Infrastructure', 'Operating_Environment', 'Research', 'Development', 'Government_Strategy', 'Commercial', 'Total_score'], 'number'],
            [['Country'], 'required'], // 设置一些字段为必填
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Country' => 'Country',
            'Talent' => 'Talent',
            'Infrastructure' => 'Infrastructure',
            'Operating_Environment' => 'Operating Environment',
            'Research' => 'Research',
            'Development' => 'Development',
            'Government_Strategy' => 'Government Strategy',
            'Commercial' => 'Commercial',
            'Total_score' => 'Total Score',
            'Region' => 'Region',
            'Cluster' => 'Cluster',
            'Income_group' => 'Income Group',
            'Political_regime' => 'Political Regime',
        ];
    }
}
