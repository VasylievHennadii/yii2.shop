<li <?php if(isset($category['children'])) echo 'class="dropdown"' ?>>
    <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category['id']]) ?>" <?php if(isset($category['children'])) echo 'class="dropdown-toggle" data-toggle="dropdown"' ?>>
        <?= $category['title'] ?>
    </a>
    <?php if(isset($category['children'])): ?>
        <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
            <div class="w3ls_vegetables">
                <ul>
                    <?= $this->getMenuHtml($category['children']) ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</li>