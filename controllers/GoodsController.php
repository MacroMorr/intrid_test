<?php

namespace app\controllers;

use app\helpers\GoodsHelper;
use app\services\ColorService;
use app\services\GoodsService;
use app\services\SizeService;
use app\services\StoreService;
use JetBrains\PhpStorm\ArrayShape;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\Exception;
use yii\di\NotInstantiableException;
use yii\web\Controller;

class GoodsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    #[ArrayShape(['error' => "string[]"])]
    public function actions(): array
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Получить список товаров
     * @return string
     * @throws InvalidConfigException|NotInstantiableException|Exception
     */
    public function actionList(): string
    {
        $goodsService = Yii::$container->get(GoodsService::class);
        $colorService = Yii::$container->get(ColorService::class);
        $sizeService = Yii::$container->get(SizeService::class);

        $colors = Yii::$app->request->get('colors');
        $sizes = Yii::$app->request->get('sizes');

        $filter = [];
        $colors && $filter['colors'] = $colors;
        $sizes && $filter['sizes'] = $sizes;
        $goodsList = $goodsService->getList($filter);
        $colors = $colorService->getAllFromStore();
        $sizes = $sizeService->getAllFromStore();

        return $this->render('list', compact('goodsList', 'colors', 'sizes'));
    }

    /**
     * Карточка товара
     * @return string
     * @throws InvalidConfigException|NotInstantiableException|Exception
     */
    public function actionCard(): string
    {
        $goodsService = Yii::$container->get(GoodsService::class);
        $storeService = Yii::$container->get(StoreService::class);
        $colorService = Yii::$container->get(ColorService::class);
        $sizeService = Yii::$container->get(SizeService::class);

        $id = Yii::$app->request->get('id');
        $goodsCard = $goodsService->getById($id);
        $storeList = $storeService->getByGoodsId($id);
        $colors = $colorService->getByGoodsId($id);
        $sizes = $sizeService->getByGoodsId($id);
        $goodsCard = GoodsHelper::mergeParams($goodsCard, compact('storeList', 'colors', 'sizes'));

        return $this->render('card', compact('goodsCard'));
    }
}
