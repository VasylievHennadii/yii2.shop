<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="<?= \yii\helpers\Url::home() ?>">Home</a><span>|</span></li>
            <li>Оформление заказа</li>
        </ul>
    </div>
</div>
<!-- //products-breadcrumb -->
<!-- banner -->
<div class="banner">
    <?= $this->render('//layouts/inc/sidebar') ?>

    <div class="w3l_banner_nav_right">
        <!-- about -->
        <div class="privacy about">
            <h3>Chec<span>kout</span></h3>
<?php if(!empty($session['cart'])): ?>
            <div class="checkout-right">
                <h4>Your shopping cart contains: <span><?= $session['cart.qty'] ?> Product(s)</span></h4>
                <div class="cart-table">
                    <div class="overlay">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <table class="timetable_sub">
                        <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach ($session['cart'] as $id => $item): ?>
                            <tr>
                                <td class="invert"><?= $i; ?></td>
                                <td class="invert-image">
                                    <a href="<?= yii\helpers\Url::to(['product/view', 'id' => $id]) ?>">
                                        <?= \yii\helpers\Html::img("@web/products/{$item['img']}", ['alt' => $item['title']]) ?>
                                    </a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus" data-id="<?= $id ?>" data-qty="-1">&nbsp;</div>
                                            <div class="entry value"><span><?= $item['qty']?></span></div>
                                            <div class="entry value-plus active" data-id="<?= $id ?>" data-qty="1">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert"><?= $item['title']?></td>

                                <td class="invert">$<?= $item['price']?></td>
                                <td class="invert">
                                    <div class="rem">
                                        <a class="close1" href="<?= yii\helpers\Url::to(['cart/del-item', 'id' => $id]) ?>"> </a>
                                    </div>

                                </td>
                            </tr>   
                            <?php $i++; endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="checkout-left">
                <div class="col-md-4 checkout-left-basket">
                    <h4>Continue to basket</h4>
                    <ul>
                        <?php foreach ($session['cart'] as $item): ?>
                        <li><?= $item['title'] ?> <i>-</i> <span>$<?= $item['price'] * $item['qty']?> </span></li>  
                        <?php endforeach;?>
                        <li>Total <i>-</i> <span>$<?= $session['cart.sum'] ?></span></li>
                    </ul>
                </div>
                <div class="col-md-8 address_form_agile">
                    <h4>Add a new Details</h4>
                    <form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
                        <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                            <div class="information-wrapper">
                                <div class="first-row form-group">
                                    <div class="controls">
                                        <label class="control-label">Full name: </label>
                                        <input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
                                    </div>
                                    <div class="w3_agileits_card_number_grids">
                                        <div class="w3_agileits_card_number_grid_left">
                                            <div class="controls">
                                                <label class="control-label">Mobile number:</label>
                                                <input class="form-control" type="text" placeholder="Mobile number">
                                            </div>
                                        </div>
                                        <div class="w3_agileits_card_number_grid_right">
                                            <div class="controls">
                                                <label class="control-label">Landmark: </label>
                                                <input class="form-control" type="text" placeholder="Landmark">
                                            </div>
                                        </div>
                                        <div class="clear"> </div>
                                    </div>
                                    <div class="controls">
                                        <label class="control-label">Town/City: </label>
                                        <input class="form-control" type="text" placeholder="Town/City">
                                    </div>
                                    <div class="controls">
                                        <label class="control-label">Address type: </label>
                                        <select class="form-control option-w3ls">
                                            <option>Office</option>
                                            <option>Home</option>
                                            <option>Commercial</option>

                                        </select>
                                    </div>
                                </div>
                                <button class="submit check_out">Delivery to this Address</button>
                            </div>
                        </section>
                    </form>
                    <div class="checkout-right-basket">
                        <a href="payment.html">Make a Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                    </div>
                </div>

                <div class="clearfix"> </div>

            </div>
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif;?>
        </div>
        <!-- //about -->
    </div>
    <div class="clearfix"></div>
</div>
<!-- //banner -->