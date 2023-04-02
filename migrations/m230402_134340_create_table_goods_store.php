<?php

use yii\db\Migration;

/**
 * Class m230402_134340_create_table_goods_store
 */
class m230402_134340_create_table_goods_store extends Migration
{
    public function up(): bool
    {
        try {
            $this->createTable('goods_store', [
                'id' => $this->primaryKey(),
                'goods_id' => $this->integer()->notNull(),
                'goods_color_id' => $this->integer()->notNull(),
                'goods_size_id' => $this->integer()->notNull(),
                'quantity' => $this->integer()->notNull()->defaultValue(0),
                'article' => $this->integer()->notNull(),
            ], "COMMENT 'Товары на складе'");

            $this->addForeignKey(
                'goods_store_fk_1',
                'goods_store',
                'goods_id',
                'goods',
                'id'
            );
            $this->addForeignKey(
                'goods_store_fk_2',
                'goods_store',
                'goods_color_id',
                'goods_color',
                'id'
            );
            $this->addForeignKey(
                'goods_store_fk_3',
                'goods_store',
                'goods_size_id',
                'goods_size',
                'id'
            );

            return true;
        } catch (Exception $exception) {
            echo "m230402_134340_create_table_goods_store cannot be created.\n";
            echo $exception->getMessage();

            return false;
        }
    }

    public function down(): bool
    {
        try {
            $this->dropTable('goods_store');

            return true;
        } catch (Exception $exception) {
            echo "m230402_134340_create_table_goods_store cannot be reverted.\n";
            echo $exception->getMessage();

            return false;
        }
    }
}
