<div class="thumbnail">
    <a href="product.php?id=<?= $product['id'] ?>"><img src="img/product/<?= $product['picture'] ?>" alt="<?= cutString($product['name'], 100) ?>"></a>
    <div class="caption">
        <h4 class="pull-right"><?= $product['price'] ?> €</h4>
        <h4><a href="product.php?id=<?= $product['id'] ?>"><?= cutString($product['name'], 20) ?></a>
        </h4>
        <p><?= cutString($product['description'], 100) ?></p>
    </div>
    <div class="ratings">
        <p class="pull-right">15 reviews</p>
        <p>
            <?php for($i = 0; $i <= $product['rating']*5; $i++){ ?>
                <span class="glyphicon glyphicon-star"></span>
            <?php } ?>
            

        </p>
    </div>
    <div class="btns clearfix">
        <a class="btn btn-info pull-left" href="product.php?id=<?= $product['id'] ?>"><span class="glyphicon glyphicon-eye-open"></span> View</a>
        <a class="btn btn-primary pull-right" href="product.html"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>
    </div>
</div><!-- /.thumbnail -->
