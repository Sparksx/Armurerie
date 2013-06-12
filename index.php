<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>
            Armurerie
        </title>
		
		<?php
		// Inclure le fichier loadArmurerie ENTRE LES BALISES <head>
		include_once 'armurerie/loadArmurerie.php';
		?>
    </head>
    <body>
        <?php
        try {
            //$GLOBALS['armurerie']->load(24, true);
            echo $GLOBALS['armurerie']->show(array(13, 5, 11, 12));
        } catch (Exception $e) {
            echo $e->__toString();
        }
        ?>
    </body>
</html>