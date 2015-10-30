Shop
=============

#### *** DESCRIPTION *** ####

Mini e-commerce avec catalogue produits, recherche, inscription/connexion, panier, et plus si affinités... :)

----------
#### *** CONSEILS *** ####

- ``Tous les templates html sont fournis``
- ``Penser à la balise container lors de la découpe``
- ``Penser à réduire les balises dans l'éditeur de texte pour visualiser rapidement les blocs (flèches dans la colonne de gauche sur chaque parent)``
- ``Au besoin commenter les fermetures de balise sur les gros blocs``

<hr>
#### *** CONSIGNES *** ####

 1. Faire la découpe des templates HTML
> **CONSEIL** : Pour chaque page, commencer par renommer le .html en .php et déplacer le .html dans un dossier html

 2. Créer et inclure les fichiers config.php / db.php / func.php
> **CONSEIL** : Au besoin reprendre les fichiers d'un projet précédent en veillant à les adapter. Les inclure à un seul endroit central

 2. Gérer la navigation en affichant la page active et afficher l'année courante dans le footer :gift:

 4. Créer une base de données ``shop``
> **CONSEIL** : Penser à l'encodage utf8_general_ci

 5. Créer une table ``products`` avec les colonnes :
- id
- category INT(3) NULL DEFAULT 0
- name
- description
- price DECIMAL(11,2)
- picture
- rating DECIMAL(1,1)
- date

 6. Insérer du contenu dans la table ``products``
> **CONSEILS** :
> Pour les images, dans le champ picture, insérer le nom de l'image avec son extension (ex: product.png)
> Le champ category peut être ignoré ou rempli aléatoirement
>
> **BONUS** : Adapter un script *_generator.php pour automatiser l'insertion du contenu

 7. Sur la page d'accueil afficher les 6 produits les plus récents
> **BONUS** : Afficher 2 produits aléatoires parmi les mieux notés dans la sidebar

 8. Dans product.php, afficher 1 produit par rapport à son identifiant passé en paramètre
> **BONUS** : Afficher 3 produits associés dans la sidebar

 9. Dans les listes de produits (home, search, sidebar...etc) :
	- N'afficher qu'un extrait de la description du produit (c.f. function cutString)
	- Utiliser le bouton ``View`` pour faire un lien vers la page product.php en passant l'identifiant de produit en paramètre

	`` BONUS : Faire une fonction OU un include pour rassembler à un endroit le code HTML des blocs de produits, communs aux différentes pages``

 10. Dans search.php :
	- Récupérer les données du formulaire de recherche rapide dans le header
	- Faire la requête qui va chercher les produits correspondants à la recherche

----------
#### *** BONUS *** ####

- Inscription / connexion / déconnexion (création d'une table ``client``)
> **CONSEIL** : Reprendre des formulaires existants ou utiliser le template générique **form.html** qui contient un exemplaire de tous les champs de base d'un formulaires

- Page contact (création d'une table ``contact``), uniquement accessible aux utilisateurs connectés, avec 1 champ caché contenant l'identifiant du client
> **CONSEIL** : Reprendre un formulaire existant ou utiliser le template générique **form.html** qui contient un exemplaire de tous les champs de base d'un formulaires

- Recherche avancée
> **CONSEIL** :
> Le champ price renvoie une valeur du type "25:50" correspondant à prix_min:prix_max
> Ignorer le champ category dans un premier temps, il est introduit dans l'énoncé suivant

- Gestion des catégories de produits :
	- Création de table product_category avec les colonnes id, name
	- Insérer quelques catégories, et y rattacher des produits via le champ category de la table product
	- Afficher la liste des catégories dans la sidebar gauche
	- Renvoyer chaque catégorie sur le moteur de recherche avancée pour filtrer sur une catégorie de produit

----------
#### *** SUPER BONUS *** ####

 - Gestion de panier simple :
	- Création d'une table cart_product, jointure entre client/user et product :
id
client_id
product_id
quantity NULL DEFAULT 1
> **CONSEIL** : Prévoir un index UNIQUE sur le couple client_id/product_id

	- Gestion du CRUD (requêtes INSERT / SELECT / UPDATE / DELETE)

 - Gestion de panier avancée :
	- mémorisation en cookie/session
	- gestion des quantités
	- ajax


----------
#### *** POUR LE FUN *** ####

Des thèmes de couleur sont fournis dans le répertoire ``/css/themes/``.

Pour changer de thème il faut remplacer dans le header, la ligne suivante (~13) :
```
<link href="css/themes/default/bootstrap.min.css" rel="stylesheet">
```
Par :
```
<link href="css/themes/nom_du_theme/bootstrap.min.css" rel="stylesheet">
```

Un script est également à disposition pour changer de thème à l'aide d'une liste déroulante (``tools/theme-switcher.php``), dont voici le contenu :

La partie PHP à inclure dans la ``config`` ou le ``header`` :
```
$themes = glob('css/themes/*');
$current_theme = !empty($_GET['theme']) ? basename($_GET['theme']) : 'default';
```

La ligne d'inclusion du thème css (~13) à (rem)placer dans le ``header`` :
```
<link href="css/themes/<?= $current_theme ?>/bootstrap.min.css" rel="stylesheet">
```

Le code HTML de la liste déroulante à placer directement après l'ouverture de la balise ``body`` :
```
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
```

Une fois le thème choisi il ne reste plus qu'à définir une valeur fixe à la variable ``$current_theme``, commenter/supprimer la liste déroulante et commenter/supprimer la variable ``$themes``.

----------

> " yIghoSDo' 'ej yIghoSDo'! "
