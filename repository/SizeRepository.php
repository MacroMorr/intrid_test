<?php

namespace app\repository;

use Yii;
use yii\db\Exception;

class SizeRepository
{
    /**
     * Получить все размеры товаров, которые есть на складе
     * @return array
     * @throws Exception
     */
    public static function getAllInStore(): array
    {
        return Yii::$app->db->createCommand('
            SELECT DISTINCT size.id, size.name
            FROM goods_size as size
                INNER JOIN goods_store gs on size.id = gs.goods_color_id;
        ')->queryAll() ?: [];
    }

    /**
     * Получить размеры по идентфиикатору товара, которые есть на складе
     * @param int $goodsId ID товара
     * @return array
     * @throws Exception
     */
    public static function getByGoodsId(int $goodsId): array
    {
        return Yii::$app->db->createCommand('
            SELECT DISTINCT size.id, size.name
            FROM goods_size size
                INNER JOIN goods_store store on size.id = store.goods_size_id
            WHERE store.goods_id = :goods_id
        ')->bindParam(':goods_id', $goodsId)->queryAll() ?: [];
    }
}