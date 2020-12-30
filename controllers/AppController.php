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

    /**
     * метод регистрации мета-тегов
     */
    protected function setMeta($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }

}