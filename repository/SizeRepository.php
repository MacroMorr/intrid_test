<?php

namespace app\repository;

use Yii;

class SizeRepository
{
    public static function getAllInStore(): array
    {
        $sql = "
            SELECT DISTINCT gsize.id, gsize.name
            FROM goods_size as gsize
                INNER JOIN goods_store gs on gsize.id = gs.goods_color_id;
        ";

        return Yii::$app->db->createCommand($sql)->queryAll();
    }
}