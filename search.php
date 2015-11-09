<?php
    require_once 'partials/head.php';

    $search = !empty($_GET['q']) ? strip_tags($_GET['q']) : '';

    $category = !empty($_GET['category']) ? intval($_GET['category']) : 0;
    $category = !empty($_POST['category']) ? intval($_POST['category']) : $category;
    $price = !empty($_POST['price']) ? strip_tags($_POST['price']) : '';

    //Get min_price and max_price from price input
	$price_separator_pos = strpos($price, ',');
	$min_price = !empty($_POST['price']) ? substr($price, 0, $price_separator_pos) : 0;
	$max_price = !empty($_POST['price']) ? substr($price, $price_separator_pos+1) : 200;

    if(!empty($_GET)){
    	$sql = 'SELECT * FROM products WHERE (name LIKE :name OR description LIKE :description) AND price >= :min_price AND price <= :max_price';

    	if(!empty($category)){
    		$sql .= ' AND category = :category';
    	}

        $query = $db->prepare($sql.' ORDER BY date DESC');

        $query->bindValue('description', '%'.$search.'%');
        $query->bindValue('name', '%'.$search.'%');
        $query->bindValue('min_price', intval($min_price), PDO::PARAM_INT);
        $query->bindValue('max_price', intval($max_price), PDO::PARAM_INT);

        if(!empty($category)){
        	$query->bindValue('category', $category, PDO::PARAM_INT);
        }

        $query->execute();
        $results = $query->fetchAll();

        $count = count($results);
    }


?>

        <div class="row">

			<div class="col-lg-12">

				<h1 class="page-header">Search</h1>

				<form class="form-horizontal" method="GET">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="What are you searching for?" value="<?= $search ?>">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><span class=" glyphicon glyphicon-search"></span></button>
						</span>
					</div>
				</form>

			</div>

			<div class="col-lg-12">

				<h1 class="page-header">Filters</h1>

				<form class="search form-inline" method="POST">
					<div class="form-group">
						<input type="hidden" name="q" value="<?= $search ?>">

						<label for="category">Category</label>
						<select id="category" name="category" class="form-control">
							<option value="" selected disabled>None</option>
							<?php foreach($categories as $category_info){
								$selected = $category == $category_info['id'] ? ' selected' : '';
								?>
								<option value="<?= $category_info['id'] ?>"<?= $selected ?>><?= ucfirst($category_info['name']) ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<label for="price">Price</label>
						0 € <input id="price" name="price" type="text" value="<?= $min_price.','.$max_price ?>" data-slider-min="0" data-slider-max="200" data-slider-step="1" data-slider-value="[<?= $min_price ?>,<?= $max_price ?>]"/> 200 €
					</div>

					<div class="form-group">
						<label class="checkbox-inline">
							<input type="checkbox" id="picture" name="picture" value="1"> Picture
						</label>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
						</button>
					</div>
				</form>

			</div><!-- /.col-lg-12 -->

			<hr>
            <?php if(!empty($_GET)){ ?>
                <div class="col-lg-12">
                <h1 class="page-header"><?= $count ?> search results<?= !empty($search) ? ' for "'.$search.'"' : '' ?></h1>
            </div>

            <?php foreach($results as $product){ ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                   <?php include 'partials/thumbnail_common.php'; ?>
                </div>
            <?php }
            } ?>




		</div>

    <?php
    require_once 'partials/footer.php';
