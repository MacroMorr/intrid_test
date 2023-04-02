<?php

namespace app\controllers;

use app\services\ColorService;
use app\services\GoodsService;
use app\services\SizeService;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\web\View;

class GoodsController extends Controller
{
    private GoodsService $goodsService;
    private ColorService $colorService;
    private SizeService $sizeService;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->goodsService = new GoodsService();
        $this->colorService = new ColorService();
        $this->sizeService = new SizeService();
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * todo
     * @return string
     */
    public function actionList()
    {
        $colors = Yii::$app->request->get('colors');
        $sizes = Yii::$app->request->get('sizes');

        $filter = [];
        $colors && $filter['colors'] = $colors;
        $sizes && $filter['sizes'] = $sizes;
        $goodsList = $this->goodsService->getList($filter);
        $colors = $this->colorService->getAllFromStore();
        $sizes = $this->sizeService->getAllFromStore();

        return $this->render('list', compact('goodsList', 'colors', 'sizes'));
    }
}
