<?php

use yii\db\Migration;

/**
 * Class m230402_134310_create_table_goodsModel
 */
class m230402_134310_create_table_goods_model extends Migration
{
    public function up(): bool
    {
        try {
            $this->createTable('goods_model', [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull()->unique(),
            ], "COMMENT 'Модели товаров'");
            return true;
        } catch (Exception $exception) {
            echo "m230402_134310_create_table_goods_model cannot be created.\n";
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
            echo "m230402_134310_create_table_goods_model cannot be reverted.\n";
            echo $exception->getMessage();
            return false;
        }
    }
}
