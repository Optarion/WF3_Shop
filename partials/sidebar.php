<?php
    if($current_page == 'product.php'){
        $query = $db->prepare('SELECT * FROM products WHERE category = :category AND id != :id LIMIT 3');
        $query->bindValue('category', $current_product['category'],PDO::PARAM_INT);
        $query->bindValue('id', $id, PDO::PARAM_INT);
    }else{
        $query = $db->prepare('SELECT * FROM products ORDER BY rating DESC LIMIT 2');
    }
    $query->execute();
    $rand_products = $query->fetchAll();
?>

<div class="col-md-3">
    <p class="lead">Categories</p>
    <div class="list-group">
        <?php foreach($categories as $category){ ?>
            <a href="search.php?category=<?= $category['id'] ?>" class="list-group-item"><?= ucfirst($category['name']) ?></a>
        <?php } ?>

    </div>

    <p class="lead">Featured products</p>
    <?php foreach ($rand_products as $product) {

    include 'partials/thumbnail_common.php';

    } ?>

</div>