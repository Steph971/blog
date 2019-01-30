<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="../assets/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Liste des Articles</h1>
 
        
        <?php
        foreach($posts as $article)
        {
        ?>
		
			<div class="post">
				<h3>
					<?= htmlspecialchars($article['title']); ?>
                    le <?= htmlspecialchars($article['date_cont']); ?></br>

                    Auteur : <?= $article['author']; ?>
				</h3>
				
				<p>
					<?= htmlspecialchars($article['content']); ?></br>
                    </br>
                    <a href="index.php?page=selectPost&amp;id=<?=$article['id']?>"><em>Modifier</em></a>
                    <a href="index.php?page=deletePost&amp;id=<?=$article['id']?>"><em>Supprimer</em></a>
				</p>
			</div> 
		
        <?php
        }
        ?>
		
    </body>
</html>
