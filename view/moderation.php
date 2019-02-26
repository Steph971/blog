<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="../assets/style.css" rel="stylesheet" /> 
    </head>

        <h1>Attente de validation:</h1>

            <?php
            foreach ($coms as $com) {
            
            ?>
            <div>
                <?= htmlspecialchars($com['pseudo']);?></br>
                <?= htmlspecialchars($com['message']);?></br>
                <a href="index.php?page=validComment&amp;id=<?=$com['id']?>">Valider</a> - <a href="index.php?page=suppComment&amp;id=<?=$com['id']?>">Supprimer</a></br></br>
            </div>
            <?php
                 }
            ?>

            
    </body>
</html>
