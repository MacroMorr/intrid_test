<?php

use yii\db\Migration;

/**
 * Class m230402_134320_create_table_goods
 */
class m230402_134320_create_table_goods extends Migration
{
    public function up(): bool
    {
        try {
            $this->createTable('goods', [
                'id' => $this->primaryKey(),
                'goods_category_id' => $this->integer()->notNull(),
                'goods_model_id' => $this->integer()->notNull(),
                'name' => $this->string(255)->notNull(),
                'price' => $this->float()->notNull(),
            ], "COMMENT 'Список товаров'");

            $this->addForeignKey(
                'goods_fk_1',
                'goods',
                'goods_category_id',
                'goods_category',
                'id'
            );
            $this->addForeignKey(
                'goods_fk_2',
                'goods',
                'goods_model_id',
                'goods_model',
                'id'
            );

            return true;
        } catch (Exception $exception) {
            echo "m230402_134320_create_table_goods cannot be created.\n";
            echo $exception->getMessage();

            return false;
        }
    }

    public function down(): bool
    {
        try {
            $this->dropTable('goods');

            return true;
        } catch (Exception $exception) {
            echo "m230402_134320_create_table_goods cannot be reverted.\n";
            echo $exception->getMessage();

            return false;
        }
    }
}
