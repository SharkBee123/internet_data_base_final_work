<?php

/**
 * Team: 啊对对队
 * Coding by 蔡鸿 2212989, 20241216
 * 六年投资数量与投资额发展php
 */

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "investment_data".
 *
 * @property int $id
 * @property int $year
 * @property int $investment_quantity
 * @property float $investment_amount
 */
class InvestmentData extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'investment_data';  // 指定对应的数据库表名
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year', 'investment_quantity', 'investment_amount'], 'required'],
            [['year', 'investment_quantity'], 'integer'],
            [['investment_amount'], 'number'],
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
            'investment_quantity' => 'Investment Quantity',
            'investment_amount' => 'Investment Amount (in billions)',
        ];
    }

    /**
     * 获取所有年份和投资数量、投资额数据
     * 
     * @return array
     */
    public static function getInvestmentData()
    {
        return self::find()
            ->select(['year', 'investment_quantity', 'investment_amount'])
            ->orderBy(['year' => SORT_ASC])  // 按年份升序排列
            ->all();
    }
    /**
     * 获取某一特定年份的数据
     * 
     * @param int $year
     * @return InvestmentData|null
     */
    public static function getInvestmentByYear($year)
    {
        return self::findOne(['year' => $year]);
    }
}
