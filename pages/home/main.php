<?php

require_once(__DIR__ . '/../../models/Product.php');
require_once(__DIR__ . '/../../models/ProductCategory.php');

$productCategory = new ProductCategory;
$products = new Product;

?>

<main class="main">
    <div class="banner">
        <img class="img-banner" src="assets/images/home/header/banner.png" alt="">
    </div>

    <section class="main-products">
        <h2 class="main-subtitle">Novidades</h2>
            <article class="products">
                <?php foreach ($products->read() as $product) { ?>
                <?php foreach ($products->readByNews($product['product_id']) as $news) { ?>
                    <?php $image = file_exists(DIR_DOCUMENT . '/assets/images/' . $news['banner']) 
                        ? DIR_IMG . '/' . $news['banner'] 
                        : DIR_IMG . '/products/placeholder.png';?>

                    <figure class="product-items">
                        <a href="?page=product&slug=<?= $news['slug'] ?>">
                            <div class="background-product">
                                <img class="image-product" src="<?= $image ?>" alt="">
                            </div>
                        </a>

                        <div class="items-about">
                            <a href="?page=product&slug=<?= $news['slug'] ?>" class="product-slug">
                                <figcaption class="about"><?= $news['name'] ?></figcaption>
                            </a>
                            
                            <figcaption class="value">R$ <?= str_replace('.', ',', $news['special_price']) ?></figcaption>
                        </div>
                    </figure>
                <?php }} ?>
            </article>

        <?php foreach ($productCategory->read() as $category) { ?>
            <?php $products = $productCategory->readByCategory($category['category_id'])?>

            <?php if (count($products)): ?>
                <h2 class="main-subtitle"><?=  $category['name']; ?></h2>

                <article class="products">
                    <?php foreach ($products as $product) { ?>
                        <?php $image = file_exists(DIR_DOCUMENT . '/assets/images/' . $product['banner']) 
                            ? DIR_IMG . '/' . $product['banner'] 
                            : DIR_IMG . '/products/placeholder.png';?>

                        <figure class="product-items">
                            <a href="?page=product&slug=<?= $product['slug'] ?>">
                                <div class="background-product">
                                    <img class="image-product" src="<?= $image ?>" alt="">
                                </div>
                            </a>

                            <div class="items-about">
                                <a href="?page=product&slug=<?= $product['slug'] ?>" class="product-slug">
                                    <figcaption class="about"><?= $product['name'] ?></figcaption>
                                </a>
                                
                                <figcaption class="value">R$ <?= str_replace('.', ',', $product['special_price']) ?></figcaption>
                            </div>
                        </figure>
                    <?php } ?>
                </article>
            <?php endif ?>
        <?php } ?>
    </section>
</main>