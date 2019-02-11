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

    <a href="index.php?page=home">Page d'accueil</a>

        <h2>Ajouter un article:</h2>

        <form method="POST" action="index.php?page=addPost">
           <p> <label for="title">Titre: </label>
            <input type="text" name="title"></p>
            <label for="content">Contenu:</label>
            <textarea name="content"></textarea>
            <input type="submit">

           <p><a href="index.php?page=deconnexion"><em>Déconnexion</em></a></p>

        </form>

		
    </body>
</html>