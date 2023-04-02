<?php

namespace app\repository;

use Yii;
use yii\db\Exception;

class ColorRepository
{
    /**
     * Получить все цвета товаров, которые есть на складе
     * @return array
     * @throws Exception
     */
    public static function getAllInStore(): array
    {
        return Yii::$app->db->createCommand('
            SELECT DISTINCT gc.id, gc.name
            FROM goods_color as gc
                INNER JOIN goods_store gs on gc.id = gs.goods_color_id;
        ')->queryAll();
    }

    /**
     * Получить цвета по идентфиикатору товара, которые есть на складе
     * @param int $goodsId ID товара
     * @return array
     * @throws Exception
     */
    public static function getByGoodsId(int $goodsId): array
    {
        return Yii::$app->db->createCommand('
            SELECT DISTINCT color.id, color.name
            FROM goods_color color
                INNER JOIN goods_store store on color.id = store.goods_color_id
            WHERE store.goods_id = :goods_id
        ')->bindParam(':goods_id', $goodsId)->queryAll();
    }
}