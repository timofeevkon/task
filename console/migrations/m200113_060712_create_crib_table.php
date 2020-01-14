<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%crib}}`.
 */
class m200113_060712_create_crib_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = <<<SQL

create table crib
(
    crib_id bigserial not null
        constraint crib_pk
            primary key,
    title   text      not null
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
        $this->dropTable('{{%crib}}');
    }
}
