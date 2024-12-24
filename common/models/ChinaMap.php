<?php

/**
 * Team: 啊对对队
 * Coding by 匡俊霖 2212565, 20241217
 * 各省综合AI竞争力php
 */


namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "chinamap".
 *
 * @property int $id
 * @property string $province
 * @property float $competitiveness_index
 */
class Chinamap extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chinamap';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['province', 'competitiveness_index'], 'required'],
            [['competitiveness_index'], 'number'],
            [['province'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'province' => 'Province',
            'competitiveness_index' => 'Competitiveness Index',
        ];
    }

    /**
     * 获取省份对应的竞争力指数
     * 
     * @param string $province
     * @return float|null
     */
    public static function getCompetitivenessIndexByProvince($province)
    {
        // 查找数据库中的竞争力指数，假设省份名称是唯一的
        $data = self::find()->where(['province' => $province])->one();
        return $data ? $data->competitiveness_index : null;
    }
}
