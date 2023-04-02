<?php

namespace app\repository;

use Yii;

class ColorRepository
{
    public static function getAllInStore(): array
    {
        $sql = "
            SELECT DISTINCT gc.id, gc.name
            FROM goods_color as gc
                INNER JOIN goods_store gs on gc.id = gs.goods_color_id;
        ";

        return Yii::$app->db->createCommand($sql)->queryAll();
    }
}