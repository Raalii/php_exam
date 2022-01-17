<?php
require './app/models/User.php';
session_start();
require './app/functions.php';
redirectUserAccordingToStateOfSession();
require './app/view/include/header.php';
require './app/controllers/_index.php';
?>

<pre>
    <h1 style="color : white"> Bienvenue, <?= $_SESSION['auth']->getUsername(); ?> </h1>
	<h3 style="color : white; margin-left: 5mm;">Voici les dernières actualités : </h3>
</pre>
	<div class="indexContainer">

		<?php while ($row = $result->fetch_row()) : 
			$haveResult = true;
		?>		
				<div class="container">
					<div class="square">
						<img src="https://images.unsplash.com/photo-1504610926078-a1611febcad3?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e1c8fe0c9197d66232511525bfd1cc82&auto=format&fit=crop&w=1100&q=80" class="mask">
						<div class="h1"><?= $row[1] ?></div>
						<p> <?= (strlen($row[2]) < 300) ? $row[2] : substr($row[2], 0, 300) . "..." ?> </p>
						<form action="/app/view/pages/postDetail.php" method="GET">
							<input type="hidden" name="articleDetail" value="<?= $row[0] ?>">
							<div><button class="button">En savoir plus</button></div>
							</form>
					</div>
				</div>
		<?php endwhile;	?>

		<?php if (!$haveResult) : ?>
			<h1>Il n'y a pas encore eu de publication. <a href="/app/view/pages/newPost.php">Publier ?</a></h1>
		<?php endif; ?>
	</div>


<?php
require "./app/view/include/footer.php";
?>