<?php
    require_once 'partials/head.php';

    $id = !empty($_GET['id']) ? intval($_GET['id']) : 0;

    if(empty($id)){
        header('refresh:2;url=index.php');
        exit('Unknown id');
    }else{
        $query = $db->prepare('SELECT * FROM products WHERE id = :id');
        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->execute();
        $current_product = $query->fetch();
    }
    
?>

        <div class="row">

            <?php
                include_once 'partials/sidebar.php';
            ?>

            <div class="col-md-9">

                <div class="thumbnail">
                    <img class="img-responsive" src="img/product/<?= $current_product['picture'] ?>" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right"><?= $current_product['price'] ?> €</h4>
                        <h4><a href="#"><?= ucfirst($current_product['name']) ?></a>
                        </h4>
                        <blockquote>
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <strong>Duis aute irure dolor in</strong> reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
                        </blockquote>
                        <p><?= ucfirst($current_product['description']) ?></p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">3 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            4.0 stars
                        </p>
                    </div>
                    <div class="btns text-center clearfix">
                        <a class="btn btn-success" href=""><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>
                    </div>
                </div>

                <div class="well">

                    <div class="text-right">
                        <a class="btn btn-primary">Leave a Review</a>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">10 days ago</span>
                            <p>This product was great in terms of quality. I would definitely buy another!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">12 days ago</span>
                            <p>I've alredy ordered another one!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">15 days ago</span>
                            <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>


    <?php
    require_once 'partials/footer.php';