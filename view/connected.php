<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>


		<?php

		if(isset($_SESSION['pseudo'])) {
			echo 'bonjour' . $_SESSION['pseudo'];
		}
		?>

		
    </body>
</html>