<?php
// A placer dans un emplacement central (Ex: config / header)
$themes = glob('css/themes/*');
$current_theme = !empty($_GET['theme']) ? basename($_GET['theme']) : basename($themes[array_rand($themes)]);
?>

<!-- A (rem)placer dans le header -->
<link href="css/themes/<?= $current_theme ?>/bootstrap.min.css" rel="stylesheet">

<!-- A placer apres l'ouverture du body -->
<form id="form-theme-select" method="GET">
	<div class="form-group">
		<select id="theme-select" name="theme" class="form-control" onchange="javascript:$('#form-theme-select').submit();">
			<option value="">Select a theme</option>
			<?php
			foreach($themes as $theme_path) {
				$theme = basename($theme_path);
				$selected = $theme == $current_theme ? ' selected="selected"' : '';
			?>
			<option value="<?= $theme ?>"<?= $selected ?>><?= $theme ?></option>
			<?php } ?>
		</select>
	</div>
</form>