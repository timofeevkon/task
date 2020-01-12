<?php
namespace common\fixtures;

use common\models\Product;
use yii\test\ActiveFixture;

class ProductFixture extends ActiveFixture
{
    public $dataDirectory = '@common/tests/_data';
    public $depends = [AnimalFixture::class];
    public $modelClass = Product::class;
}