<?php

namespace app\components;

use yii\base\Widget;

class MenuWidget extends Widget
{

    public $tpl;
    public $ul_class;
    public $data;
    public $tree;
    public $menuHtml;

    public function init()
    {
        parent::init();
        if($this->ul_class === null){
            $this->ul_class = 'menu';
        }
        if($this->tpl === null){
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
        return $this->tpl;
    }


}