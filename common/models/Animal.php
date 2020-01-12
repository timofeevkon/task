<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "animal".
 *
 * @property int $animal_id
 * @property int $crib_id
 * @property string $type Тип животных (корова или курица)
 * @property string $product_type
 * @property int $product_amount_range
 * @property string $product_unit
 *
 * @property Crib $crib
 */
class Animal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'animal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['crib_id', 'type', 'product_type', 'product_amount_range', 'product_unit'], 'required'],
            [['crib_id', 'product_amount_range'], 'default', 'value' => null],
            [['crib_id', 'product_amount_range'], 'integer'],
            [['type', 'product_type', 'product_unit'], 'string'],
            [['crib_id'], 'exist', 'skipOnError' => true, 'targetClass' => Crib::className(), 'targetAttribute' => ['crib_id' => 'crib_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'animal_id' => 'Animal ID',
            'crib_id' => 'Crib ID',
            'type' => 'Тип животных (корова или курица)',
            'product_type' => 'Product Type',
            'product_amount_range' => 'Product Amount Range',
            'product_unit' => 'Product Unit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrib()
    {
        return $this->hasOne(Crib::className(), ['crib_id' => 'crib_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AnimalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AnimalQuery(get_called_class());
    }
}
