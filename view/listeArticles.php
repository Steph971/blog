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
				</h3>
				
				<p>
					<?= htmlspecialchars($article['content']); ?></br>
                    </br>
				</p>
			</div> 
		
        <?php
        }
        ?>
		
    </body>
</html>
