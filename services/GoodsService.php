<?php

namespace app\services;

use app\repository\GoodsRepository;

class GoodsService
{
    public function getList(array $filter): array
    {
        if ($filter && $filter['colors']) {
            $filter['colors'] = array_map(static function ($colorId) {
                return (int)$colorId;
            }, explode(',', $filter['colors']));
        }

        if ($filter && $filter['sizes']) {
            $filter['sizes'] = array_map(static function ($sizeId) {
                return (int)$sizeId;
            }, explode(',', $filter['sizes']));
        }

        return GoodsRepository::getList($filter);
    }
}