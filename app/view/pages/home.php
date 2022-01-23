<div class="homeContainer">
	<pre>
		<h1 style="color : white"> Bienvenue, <?= $_SESSION['auth']->getUsername(); ?> </h1>
		<h3 style="color : white; margin-left: 5mm;">Voici les dernières actualités : </h3>
	</pre>
	<div class="indexContainer">
		<?php while ($row = $result->fetch_row()) :
			$haveResult = true;
			$currentPost = new Post(...$row);
		?>
			<div class="container">
				<div class="square">
					<img src="https://images.unsplash.com/photo-1504610926078-a1611febcad3?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e1c8fe0c9197d66232511525bfd1cc82&auto=format&fit=crop&w=1100&q=80" class="mask">
					<div class="h1"><?= $currentPost->getTitle() ?></div>
					<p> <?= (strlen($currentPost->getDescription()) < 300) ? $currentPost->getDescription() : substr($currentPost->getDescription(), 0, 300) . "..." ?> </p>
					<a href="<?= BASE_URL . "/articles-details-" . $currentPost->getIdArticle() ?>"> <button class="button">En savoir plus</button></a>

				</div>
			</div>
		<?php endwhile;	?>

		<?php if (!$haveResult) : ?>
			<h1>Il n'y a pas encore eu de publication. <a href="<?= BASE_URL ?>/articles/new">Publier ?</a></h1>
		<?php endif; ?>
	</div>
</div>