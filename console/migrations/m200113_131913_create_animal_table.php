<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%animal}}`.
 */
class m200113_131913_create_animal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = <<<SQL
create table animal
(
    animal_id            bigserial not null
        constraint animal_pk
            primary key,
    crib_id              bigint    not null
        constraint animal_crib_crib_id_fk
            references crib
            on update cascade on delete restrict,
    type                 text      not null,
    product_type         text      not null,
    product_amount_range integer[] not null,
    product_unit         text      not null
);

--
comment on column animal.type is 'Тип животных (корова или курица)';

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
        $this->dropTable('{{%animal}}');
    }
}

