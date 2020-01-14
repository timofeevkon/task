<?php

namespace console\controllers;


use common\models\Animal;
use yii\console\Controller;
use yii\helpers\ArrayHelper;
use yii\helpers\Console;

/**
 * Class MainController
 * @package console\controllers
 */
class MainController extends Controller
{
    /**
     * @param int $cribId
     */
    public function actionIndex($cribId = 1)
    {
        $this->run('migrate/up', ['all', 'interactive' => 0]);
        $this->run('fixture/load', ['*', 'interactive' => 0]);
        $animals = Animal::find()->where(['crib_id' => $cribId])->all();
        $products = array_map(function (Animal $animal) {
            return $animal->collectProduct();
        }, $animals);
        $groups = ArrayHelper::index($products, null, 'type');
        foreach ($groups as $type => $group) {
            $unit = ArrayHelper::getValue(array_values($group), '0.unit');
            $sum = array_sum(ArrayHelper::getColumn($group, 'amount'));
            Console::output("{$type} - {$sum} {$unit}");
        }
    }
}