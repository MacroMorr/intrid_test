<?php

/** @var yii\web\View $this */
/** @var array $goodsList */
/** @var array $colors */
/** @var array $sizes */

use yii\helpers\Url;

$this->title = 'Список товаров';
?>
<div class="site-index" style="margin-top: 100px">
    <form class="form d-flex">
        <div class="form-group">
            <label for="form-sizes">Размер</label>
            <select id="form-sizes" name="sizes" multiple class="form-control">
                <option value=""></option>
                <?php foreach($sizes as $size): ?>
                    <option value="<?= $size['id'] ?>"><?= $size['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="form-colors">Цвет</label>
            <select id="form-colors" name="colors" multiple class="form-control">
                <option value=""></option>
                <?php foreach($colors as $color): ?>
                    <option value="<?= $color['id'] ?>"><?= $color['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Фильтровать</button>
    </form>

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
