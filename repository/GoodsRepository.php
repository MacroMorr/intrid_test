<?php

namespace app\repository;

use Yii;
use yii\db\Exception;

class GoodsRepository
{
    /**
     * Получить список товаров
     * @param array $filter Фильтр (например по цвету или размеру)
     * @throws Exception
     */
    public static function getList(array $filter = []): array
    {
        $isIssetConditions = false;

        $sql = '
            SELECT DISTINCT g.id, g.name, g.price, category.name as category
            FROM goods g
                INNER JOIN goods_store store on g.id = store.goods_id
                INNER JOIN goods_category category on g.goods_category_id = category.id
        ';
        if ($filter) {
            $sql .= '
                INNER jOIN goods_size size on store.goods_size_id = size.id
                INNER JOIN goods_color color on store.goods_color_id = color.id
            ';
        }

        if (!empty($filter['colors'])) {
            $sql .= sprintf(' WHERE `color`.`id` IN (%s)', implode(',', $filter['colors']));
            $isIssetConditions = true;
        }

        if (!empty($filter['sizes'])) {
            $sql .= $isIssetConditions ? ' AND' : ' WHERE';
            $sql .= sprintf(' `size`.`id` IN (%s)', implode(',', $filter['sizes']));
        }

        return Yii::$app->db->createCommand($sql)->queryAll();
    }


}