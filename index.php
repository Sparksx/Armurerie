<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>
            Armurerie
        </title>
		
		<?php
		// Inclure le fichier loadArmurerie ENTRE LES BALISES <head>
		include_once('armurerie/loadArmurerie.php');
		?>
    </head>
    <body>
        <?php
        try {
            echo $GLOBALS['armurerie']->show();
        } catch (Exception $e) {
            echo $e->__toString();
        }
        ?>
    </body>
</html>