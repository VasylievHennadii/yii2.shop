<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * класс для подключения стилей и скриптов для страницы admin в админ панели
 *
 * @author user
 */
class AdminAsset extends AssetBundle {
    
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css',
        'adminlte/bower_components/font-awesome/css/font-awesome.min.css',
        'adminlte/bower_components/Ionicons/css/ionicons.min.css',
        'adminlte/dist/css/AdminLTE.min.css',
        'adminlte/dist/css/skins/skin-blue.min.css',
        '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
    ];
    
    public $js = [
        'adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js',
        'adminlte/dist/js/adminlte.min.js',
        'js/admin.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',        
    ];
    
}
