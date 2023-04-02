<?php

namespace app\services;

use app\repository\GoodsRepository;
use yii\db\Exception;

class GoodsService
{
    /**
     * Получить список товаров
     * @param array $filter Фильтр товаров
     * @return array
     * @throws Exception
     */
    public function getList(array $filter): array
    {
        if ($filter && !empty($filter['colors'])) {
            $filter['colors'] = array_map(static function ($colorId) {
                return (int)$colorId;
            }, explode(',', $filter['colors']));
        }

        if ($filter && !empty($filter['sizes'])) {
            $filter['sizes'] = array_map(static function ($sizeId) {
                return (int)$sizeId;
            }, explode(',', $filter['sizes']));
        }

        return GoodsRepository::getList($filter);
    }

    /**
     * Получить товар по ID
     * @param int|string $id ID товара
     * @return array
     * @throws Exception
     */
    public function getById(int|string $id): array
    {
        return GoodsRepository::getById((int)$id);
    }
}