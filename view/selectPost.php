<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        
        <h1>
		<?php
        
		if(isset($_SESSION['pseudo'])) {
			echo 'Bonjour ' .  $_SESSION['pseudo'];
		}
		?>
    </h1>

        <h2>Modifier l'article:</h2>

        <form method="POST" action="index.php?page=updatePost">
           <p> <label for="title">Titre: </label>
            <input type="text" name="title" value="<?=$article['title'] ?>"></p>

            <label for="content">Contenu:</label>
            <textarea name="content" value="<?=$article['content'] ?>"></textarea>
            <input type="submit">

        </form>

        <a href="../view/deconnexion.php"><em>Déconnexion</em></a>

		
    </body>
</html>