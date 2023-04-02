<?php

use yii\db\Migration;

/**
 * Class m230402_134335_create_table_goods_size
 */
class m230402_134335_create_table_goods_size extends Migration
{
    public function up(): bool
    {
        try {
            $this->createTable('goods_size', [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull()->unique(),
            ], "COMMENT 'Размеры товаров'");

            return true;
        } catch (Exception $exception) {
            echo "m230402_134335_create_table_goods_size cannot be created.\n";
            echo $exception->getMessage();

            return false;
        }
    }

    public function down(): bool
    {
        try {
            $this->dropTable('goods_size');

            return true;
        } catch (Exception $exception) {
            echo "m230402_134335_create_table_goods_size cannot be reverted.\n";
            echo $exception->getMessage();

            return false;
        }
    }
}
