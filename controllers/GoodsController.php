<?php

namespace app\controllers;

use app\services\GoodsService;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class GoodsController extends Controller
{
    private GoodsService $goodsService;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->goodsService = new GoodsService();
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
     * Displays homepage.
     * @return string
     */
    public function actionList()
    {
        $colors = Yii::$app->request->get('colors');
        $sizes = Yii::$app->request->get('sizes');

        $goodsList = $this->goodsService->getList(compact('colors', 'sizes'));

        return $this->render('list', compact('goodsList'));
    }


}
