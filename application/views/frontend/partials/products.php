<div class="uk-h2 uk-text-center">OUR PRODUCTS</div>
<hr class="uk-divider-icon">

<div class="uk-child-width-6-1@m" uk-grid >
    <div class="uk-child-width-1-2 uk-child-width-1-3@s uk-grid-match uk-grid-small" uk-grid>

        <?php foreach ($products as $product) : ?>

        <div class="uk-text-center">
            <div class="uk-inline-clip uk-transition-toggle uk-light">
                
                <?= img(['src' => 'assets/images/upload/products/' . $product->image]) ?>

                <div class="uk-transition-fade uk-overlay uk-overlay-default uk-position-center ">
                    <div class="uk-transition-slide-top-small"><h4 class="uk-text-dark"><?= $product->product_name ?></h4></div>
                    <div class="uk-transition-slide-bottom-small"><h4 class="uk-text-dark"><?= $product->price ?></h4></div>
                </div>
            </div>
        </div>

        <?php endforeach; ?>

    </div>
</div>
