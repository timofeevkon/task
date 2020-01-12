<?php
namespace common\fixtures;

use common\models\Animal;
use yii\test\ActiveFixture;

class AnimalFixture extends ActiveFixture
{
    public $dataDirectory = '@common/tests/_data';
    public $depends = [CribFixture::class];

    public $modelClass = Animal::class;

}