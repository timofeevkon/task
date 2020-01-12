<?php
namespace console\controllers;


use common\models\Animal;
use yii\console\Controller;

class MainController extends Controller
{
    public function actionIndex($cribId = 1)
    {
        $animals = Animal::find()->where(['crib_id' => $cribId])->all();
        $products = array_map(function (Animal $animal) {
            return $animal->collectProduct();
        }, $animals);
    }
}