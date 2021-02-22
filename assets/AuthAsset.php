<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * класс для подключения стилей и скриптов для страницы auth в админ панели
 *
 * @author user
 */
class AuthAsset extends AssetBundle {
    
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css',
        'adminlte/bower_components/font-awesome/css/font-awesome.min.css',
        'adminlte/bower_components/Ionicons/css/ionicons.min.css',
        'adminlte/dist/css/AdminLTE.min.css',
        'adminlte/plugins/iCheck/square/blue.css',
        '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
    ];
    
    public $js = [        
        'adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js',
        'adminlte/plugins/iCheck/icheck.min.js',
        'js/admin.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',        
    ];
    
}
