<?php

require_once(__DIR__ . '../../../models/Product.php');

$product = new Product;

if (isset($_GET['slug'])) {
    $product = $product->readBySlug($_GET['slug']);
}

if (isset($_GET['insert']) && isset($_SESSION['customer'])) {
    if (empty($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    array_push($_SESSION['cart'], $product);

    header("Location: index.php?page=cart");
}

?>

<main class="container-detail">
    <div class="main-image">
        <img class="image-item" src="<?= DIR_IMG . '/' . $product['banner']?>" alt="">
    </div>
    <div class="product-info">
        <div class="product-wrapper">
            <div class="infos-wrapper">
                <h1 class="title-product"><?= $product['name'] ?></h1>

                <?php $product['status'] == 1 ? $statusColor = 'status-sucess' : $statusColor = 'status-danger' ?>
                <p class="product-status <?= $statusColor ?>"><?php echo $product['status'] == 1 ?'Produto Disponível' : 'Produto indisponível' ?> </p>

                <p class="description-price">à vista</p>

                <div class="main-price">
                    <h3 class="special-price">R$ <?= $product['special_price'] ?></h3>

                    <h4 class="price">R$ <?= $product['price'] ?></h4>
                </div>

                <a class="button-cart" href="<?= isset($_SESSION['customer']) ? '?page=product&slug=' . $product['slug']. '&insert=cart' : '?page=customer' ?>"> ADICIONAR AO CARRINHO</a>

                <h2 class="product-description"><?= $product['description'] ?></h2>
            </div>
            <div class="cards-wrapper">
                <img class="card-image" src="assets/images/detail/cartao-visa.png" alt="">
                <img class="card-image" src="assets/images/detail/cartao-mastercard.png" alt="">
                <img class="card-image" src="assets/images/detail/cartao america express.png" alt="">
                <img class="card-image" src="assets/images/detail/payment.png" alt="">
                <img class="card-image" src="assets/images/detail/cartao de credito1.png" alt="">
            </div>
        </div>
    </div>
</main>