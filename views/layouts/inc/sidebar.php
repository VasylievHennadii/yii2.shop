<?php

use app\components\MenuWidget;
?>
<div class="w3l_banner_nav_left">
    <nav class="navbar nav_bottom">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header nav_2">
            <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
        </div> 
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
            <?= \app\components\MenuWidget::widget([
                'tpl' => 'menu',
                'ul_class' => 'nav navbar-nav nav_1',
            ]) ?>
            <!-- <ul class="nav navbar-nav nav_1">
                <li><a href="products.html">Branded Foods</a></li>
                <li><a href="household.html">Households</a></li>
                <li class="dropdown mega-dropdown active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Veggies & Fruits<span class="caret"></span></a>				
                    <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
                        <div class="w3ls_vegetables">
                            <ul>	
                                <li><a href="vegetables.html">Vegetables</a></li>
                                <li><a href="vegetables.html">Fruits</a></li>
                            </ul>
                        </div>                  
                    </div>				
                </li>
                <li><a href="kitchen.html">Kitchen</a></li>
                <li><a href="short-codes.html">Short Codes</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Beverages<span class="caret"></span></a>
                    <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
                        <div class="w3ls_vegetables">
                            <ul>
                                <li><a href="drinks.html">Soft Drinks</a></li>
                                <li><a href="drinks.html">Juices</a></li>
                            </ul>
                        </div>                  
                    </div>	
                </li>
                <li><a href="pet.html">Pet Food</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Frozen Foods<span class="caret"></span></a>
                    <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
                        <div class="w3ls_vegetables">
                            <ul>
                                <li><a href="frozen.html">Frozen Snacks</a></li>
                                <li><a href="frozen.html">Frozen Nonveg</a></li>
                            </ul>
                        </div>                  
                    </div>	
                </li>
                <li><a href="bread.html">Bread & Bakery</a></li>
            </ul> -->
        </div><!-- /.navbar-collapse -->
    </nav>
</div>