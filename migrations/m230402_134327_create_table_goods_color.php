<?php

use yii\db\Migration;

/**
 * Class m230402_134327_create_table_goods_color
 */
class m230402_134327_create_table_goods_color extends Migration
{
    public function up(): bool
    {
        try {
            $this->createTable('goods_color', [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull()->unique(),
            ], "COMMENT 'Цвет товара'");

            return true;
        } catch (Exception $exception) {
            echo "m230402_134327_create_table_goods_color cannot be created.\n";
            echo $exception->getMessage();

            return false;
        }
    }

    public function down(): bool
    {
        try {
            $this->dropTable('goods_color');

            return true;
        } catch (Exception $exception) {
            echo "m230402_134327_create_table_goods_color cannot be reverted.\n";
            echo $exception->getMessage();

            return false;
        }
    }
}
