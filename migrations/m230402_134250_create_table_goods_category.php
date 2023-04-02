<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m230402_134250_create_table_goods_category
 */
class m230402_134250_create_table_goods_category extends Migration
{
    public function up(): bool
    {
        try {
            $this->createTable('goods_category', [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull()->unique(),
            ], "COMMENT 'Категории товаров'");

            return true;
        } catch (Exception $exception) {
            echo "m230402_134250_create_table_goods_category cannot be created.\n";
            echo $exception->getMessage();

            return false;
        }
    }

    public function down(): bool
    {
        try {
            $this->dropTable('goods_category');
            return true;
        } catch (Exception $exception) {
            echo "m230402_134250_create_table_goods_category cannot be reverted.\n";
            echo $exception->getMessage();
            return false;
        }
    }
}
