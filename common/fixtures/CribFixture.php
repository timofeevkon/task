<?php
namespace common\fixtures;

use common\models\Crib;
use yii\test\ActiveFixture;

class CribFixture extends ActiveFixture
{
    public $dataDirectory = '@common/tests/_data';
    public $modelClass = Crib::class;
}