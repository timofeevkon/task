<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m200114_061729_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = <<<SQL

create table product
(
    id         bigserial               not null
        constraint product_pk
            primary key,
    animal_id  bigint                  not null,
    type       text,
    amount     decimal(6, 2)           not null,
    unit       text                    not null,
    created_at timestamp default now() not null
);

SQL;

        foreach (explode("--", $sql) as $sq) {
            $this->execute($sq);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
