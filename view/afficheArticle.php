<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="../assets/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
      
        <?php
        foreach($post as $article)
        {
        ?>
		
			<div class="post">
				<h3>
					<a href="#"><?= htmlspecialchars($article['title']); ?></a>
                    le <?= htmlspecialchars($article['date_cont']); ?></br>

                    Auteur : <?= $article['author']; ?>
				</h3>
				
				<p>
					<?= htmlspecialchars($article['content']); ?></br>
                    </br>
				</p>
			</div> 
		
        <?php
        }
        ?>

        <h2>Commentaires:</h2>
            <div>
                <?= htmlspecialchars($article['author']);?></br>
                <?= htmlspecialchars($article['message']);?>
            </div>

            <h3>Ajouter un commentaire:</h3>
                <div>
                    <form action="index.php?page=addComment" method="POST">
                      <p><label for="message">Commentaire</label>
                        <textarea name="message" id="message"></textarea></p>
                        <input type="submit">
                    </form>
                </div>






		
    </body>
</html>
