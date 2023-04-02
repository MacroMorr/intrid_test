<?php

use yii\db\Migration;

/**
 * Class m230402_134340_create_table_goods_cross
 */
class m230402_134340_create_table_goods_cross extends Migration
{
    public function up(): bool
    {
        try {
            $this->createTable('goods_cross', [
                'id' => $this->primaryKey(),
                'goods_id' => $this->integer()->notNull(),
                'goods_color_id' => $this->integer()->notNull(),
                'goods_size_id' => $this->integer()->notNull(),
                'quantity' => $this->integer()->notNull()->defaultValue(0),
                'price' => $this->float()->notNull(),
                'article' => $this->integer()->notNull(),
            ], "COMMENT 'Связующая таблица по товарам'");

            $this->addForeignKey(
                'goods_cross_fk_1',
                'goods_cross',
                'goods_id',
                'goods',
                'id'
            );
            $this->addForeignKey(
                'goods_cross_fk_2',
                'goods_cross',
                'goods_color_id',
                'goods_color',
                'id'
            );
            $this->addForeignKey(
                'goods_cross_fk_3',
                'goods_cross',
                'goods_size_id',
                'goods_size',
                'id'
            );

            return true;
        } catch (Exception $exception) {
            echo "m230402_134340_create_table_goods_cross cannot be created.\n";
            echo $exception->getMessage();

            return false;
        }
    }

    public function down(): bool
    {
        try {
            $this->dropTable('goods_cross');

            return true;
        } catch (Exception $exception) {
            echo "m230402_134340_create_table_goods_cross cannot be reverted.\n";
            echo $exception->getMessage();

            return false;
        }
    }
}
