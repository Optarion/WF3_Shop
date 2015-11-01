<?php
    require_once 'partials/head.php';

    $query = $db->prepare('SELECT * FROM products ORDER BY date DESC LIMIT 6');
    $query->execute();
    $products = $query->fetchAll();
?>

        <div class="row">

            <?php
                include_once 'partials/sidebar.php';
            ?>

            <div class="col-md-9">

                <?php
                    include_once 'partials/carroussel.php';
                ?> 

                <div class="row">
                    <?php foreach($products as $product){ ?>
                        <div class="col-sm-4 col-lg-4 col-md-4">
                        <?php include 'partials/thumbnail_common.php';?>
                        </div>

                    <?php } ?>
                </div><!-- /.row -->

            </div><!-- col-md-9 -->

        </div><!-- /.row -->


    <?php
        require_once 'partials/footer.php';
