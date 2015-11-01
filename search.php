<?php
    require_once 'partials/head.php';

    $search = !empty($_GET['q']) ? strip_tags($_GET['q']) : '';

    if(!empty($search)){
        $query = $db->prepare('SELECT * FROM products WHERE name LIKE :name OR description LIKE :description ORDER BY date DESC');

        $query->bindValue('description', '%'.$search.'%');
        $query->bindValue('name', '%'.$search.'%');
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
						<input type="text" name="q" class="form-control" placeholder="Search..." value="<?= $search ?>">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><span class=" glyphicon glyphicon-search"></span></button>
						</span>
					</div>
				</form>

			</div>

			<div class="col-lg-12">

				<h1 class="page-header">Filters</h1>

				<form class="search form-inline" method="GET">
					<div class="form-group">
						<select id="category" name="category" class="form-control">
							<option value="">Category</option>
						</select>
					</div>

					<div class="form-group">
						<label for="price">Price</label>
						0 € <input id="price" name="price" type="text" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="[0,100]"/> 100 €
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
            <?php if(!empty($search)){ ?>
                <div class="col-lg-12">
                <h1 class="page-header"><?= $count ?> search results for "<?= $search ?>"</h1>
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
