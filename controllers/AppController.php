<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class AppController extends Controller{

    public function beforeAction($action)
    {
        $this->view->title = Yii::$app->name;
        return parent::beforeAction($action);
    }

}