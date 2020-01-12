<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "crib".
 *
 * @property int $crib_id
 * @property string $title
 *
 * @property Animal[] $animals
 */
class Crib extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crib';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'crib_id' => 'Crib ID',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnimals()
    {
        return $this->hasMany(Animal::className(), ['crib_id' => 'crib_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\CribQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CribQuery(get_called_class());
    }
}
