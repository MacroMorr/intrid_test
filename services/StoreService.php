<?php

namespace app\services;

use app\repository\StoreRepository;
use yii\db\Exception;

class StoreService
{
    /**
     * Получить товары со склада по ID
     * @param int|string $id ID товара
     * @return array
     * @throws Exception
     */
    public function getByGoodsId(int|string $id): array
    {
        return StoreRepository::getColumnsByGoodsId((int)$id, [
            'quantity',
            'article'
        ]);
    }
}