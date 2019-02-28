<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="../assets/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>

        <a href="index.php?page=home">Page d'accueil</a>
        
        <p>Utilisateurs :</p>
 
        
        <?php
        foreach($users as $user)
        {
        ?>
		
			<div class="user">
				<h3>
					<?= htmlspecialchars($user['pseudo']); ?>
				</h3>
				
				<p>
					<?= htmlspecialchars($user['password']); ?></br>
                    <a href="index.php?page=editUser&amp;id=<?=$user['id']?>"><em>Modifier</em></a>
                    <a href="index.php?page=delete&amp;id=<?=$user['id']?>"><em>Supprimer</em></a> <!---->
                    </br>
				</p>
			</div> 
		
        <?php
        }
        ?>
		
    </body>
</html>
