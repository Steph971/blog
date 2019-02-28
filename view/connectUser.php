<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Se Connecter</h1>

        <p> <a href="index.php?page=home">Retour</a></p>

		<form method="post" action="index.php?page=connected">

			<label for="pseudo">Pseudo : </label>
			<input type="text" name="pseudo" />
			
			<label for="password">Password : </label>
			<input type="password" name="password" />
			
			<input type="submit" value="Connexion" />
		
		</form>
		
    </body>
</html>