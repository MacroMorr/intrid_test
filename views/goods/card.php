<?php

/** @var yii\web\View $this */
/** @var array $goodsCard */

$this->title = $goodsCard['name'];
?>
<div class="site-index" style="margin-top: 100px">
    <div class="body-content">
        <div class="row"><h3><?= $goodsCard['name'] ?></h3></div>
        <div class="row">
            <div class="col-lg-4">Colors: <?= implode(', ', $goodsCard['colors']) ?></div>
            <div class="col-lg-4">Sizes: <?= implode(', ', $goodsCard['sizes']) ?></div>
            <div class="col-lg-4">Price: <?= $goodsCard['price'] ?></div>
            <div class="col-lg-4">Quantity all: <?= $goodsCard['quantity'] ?></div>
            <div class="col-lg-4">Article list: <?= implode(', ', $goodsCard['articles']) ?></div>
        </div>
    </div>
</div>
