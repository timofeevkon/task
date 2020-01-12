<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $animal_id
 * @property string|null $type
 * @property float $amount
 * @property string $unit
 * @property string $created_at
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['animal_id', 'amount', 'unit'], 'required'],
            [['animal_id'], 'default', 'value' => null],
            [['animal_id'], 'integer'],
            [['type', 'unit'], 'string'],
            [['amount'], 'number'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'animal_id' => 'Animal ID',
            'type' => 'Type',
            'amount' => 'Amount',
            'unit' => 'Unit',
            'created_at' => 'Created At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProductQuery(get_called_class());
    }
}
