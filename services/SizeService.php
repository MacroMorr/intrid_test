<?php

namespace app\services;

use app\repository\SizeRepository;
use yii\db\Exception;

class SizeService
{
    /**
     * Получить все размеры товаров, которые есть на складе
     * @return array
     * @throws Exception
     */
    public function getAllFromStore(): array
    {
        return SizeRepository::getAllInStore();
    }

    /**
     * Получить размеры по идентификатору товара, которые есть на складе
     * @param string|int $id
     * @return array
     * @throws Exception
     */
    public function getByGoodsId(string|int $id): array
    {
        return SizeRepository::getByGoodsId((int)$id);
    }
}