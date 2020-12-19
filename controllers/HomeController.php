<?php

namespace app\controllers;

class HomeController extends AppController{
    
    public function actionIndex(){

        return $this->render('index');
        
    }
    
}