<?php
return array_merge(
    array_map(function () {
        return [
            'crib_id' => 1,
            'type' => 'Корова',
            'product_type' => 'Молоко',
            'product_amount_range' => [8, 12],
            'product_unit' => 'л.'
        ];
    }, range(1, 10)),

    array_map(function () {
        return [
            'crib_id' => 1,
            'type' => 'Курица',
            'product_type' => 'Яйцо',
            'product_amount_range' => [0, 1],
            'product_unit' => 'шт.'
        ];
    }, range(1, 20))
);
