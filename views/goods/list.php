<?php

/** @var yii\web\View $this */
/** @var array $goodsList */

use yii\helpers\Url;

$this->title = 'Список товаров';
?>
<div class="site-index" style="margin-top: 100px">
    <div class="body-content">
        <div class="row"><h3>Список товаров</h3></div>
        <?php foreach($goodsList as $goods): ?>
            <div class="row">
                <div class="col-lg-12">
                    <?php $route = ['goods/card', 'id' => $goods['id']]; ?>
                    <a href="<?= Url::toRoute($route) ?>">
                        <?= $goods['name'] ?>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
