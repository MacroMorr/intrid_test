<?php

namespace app\helpers;

class GoodsHelper
{
    public static function mergeParams($goods, $params)
    {
        $goods['quantity'] = 0;
        $goods['articles'] = [];
        if (!empty($params['storeList'])) {
            foreach ($params['storeList'] as $store) {
                $goods['quantity'] += $store['quantity'];
                $goods['articles'][] = $store['article'];
            }
        }

        $goods['colors'] = [];
        if (!empty($params['colors'])) {
            foreach ($params['colors'] as $color) {
                $goods['colors'][] = $color['name'];
            }
        }

        $goods['sizes'] = [];
        if (!empty($params['sizes'])) {
            foreach ($params['sizes'] as $size) {
                $goods['sizes'][] = $size['name'];
            }
        }

        return $goods;
    }
}