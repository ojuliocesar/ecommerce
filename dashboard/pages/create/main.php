<?php

require_once(__DIR__ . '\..\..\..\models\Product.php');

$product = new Product;

if (isset($_POST['submit'])) {
    $create = $product->create($_POST);
    
    if ($create) {
        header("Location: index.php?page=read");
    } else {
        echo "Erro ao cadastrar";
    }
}

?>

<main class="main-form">
    <h1 class="main-title">Create</h1>

    <form class="main-form" method="POST">
        <div class="form-group">
            <label for="name">Produto</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite o Nome" required>
        </div>

        <div class="form-group">
            <label for="category">Categoria</label>
            <select class="form-control" name="category_id" id="category_id" required>
                <option value="" disabled selected>Selecione a categoria</option>
                <option value="1">Games</option>
                <option value="2">Livros</option>
                <option value="3">Eletrônicos</option>
                <option value="4">Moda</option>
                <option value="5">Móveis</option>
            </select>
        </div>

        <div class="form-group">
            <label for="author">Descrição</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Digite a Descrição" required>
        </div>

        <div class="form-group">
            <label for="author">Valor</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Digite o Valor" required>
        </div>

        <div class="form-group">
            <label for="author">Desconto</label>
            <input type="number" class="form-control" id="special_price" name="special_price" placeholder="Digite o Desconto" required>
        </div>

        <div class="form-group">
            <label for="">Imagem</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Escolha o arquivo</label>
                </div>
            </div>
        </div>  

        <div class="form-group">
            <label for="price">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" placeholder="Digite o Slug" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</main>