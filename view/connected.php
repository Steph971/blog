<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>


		<?php
            echo 'bonjour';

		if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {
			echo 'bonjour' . $_SESSION['pseudo'];
            echo 'bonjour';
		}
		?>

		
    </body>
</html>