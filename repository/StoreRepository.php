<?php

namespace app\repository;

use Yii;
use yii\db\Exception;

class StoreRepository
{
    /**
     * Получить колонки по идентфиикатору товара
     * @param int $goodsId ID товара
     * @param array $columns Список колонок
     * @return array
     * @throws Exception
     */
    public static function getColumnsByGoodsId(int $goodsId, array $columns): array
    {
        $sql = sprintf('
            SELECT `%s`
            FROM goods_store
            WHERE goods_id = :goods_id
        ', implode('`,`', $columns));
        $builder = Yii::$app->db->createCommand($sql);
        $builder->bindParam(':goods_id', $goodsId);

        return $builder->queryAll();
    }
}
