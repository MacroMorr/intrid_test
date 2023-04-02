<?php

namespace app\services;

use app\repository\ColorRepository;
use yii\db\Exception;

class ColorService
{
    /**
     * Получить все цвета товаров, которые есть на складе
     * @return array
     * @throws Exception
     */
    public function getAllFromStore(): array
    {
        return ColorRepository::getAllInStore();
    }

    /**
     * Получить цвета по индентификатору товавра, который есть на складе
     * @param string|int $id ID товара
     * @return array
     * @throws Exception
     */
    public function getByGoodsId(string|int $id): array
    {
        return ColorRepository::getByGoodsId((int)$id);
    }
}