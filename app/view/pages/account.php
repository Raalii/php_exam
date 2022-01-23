<?php if (!is_null($userToShow)) : ?>
    <div class="AccountContent">
        <h1><?= ($isMyAccount) ? "Mon profil <br> Nom actuel : " . $userToShow->getUsername()  : "Profil de " . $userToShow->getUsername()  ?></h1>

        <p>
            Nombre de post : <?= checkNbrOfPost($userToShow->getId()) ?>
        </p>

        <p>
            Grade : <?= $userToShow->getType() ?>
        </p>

        <?php if (!$isMyAccount) :  ?>
            <p>
                Le contacter : <?= $userToShow->getEmail() ?>
            </p>
        <?php else : ?>
            <p>Mon adresse email : <?= $userToShow->getEmail() ?> </p>
            <button class="launchModifyProfile">Modifier mes informations</button>
        <?php endif  ?>
        <?php if (!is_null($emailToModify)) : ?>
            <p style="color: <?= $emailColor ?>;"> <?= (is_null($emailSuccess)) ? $emailError : $emailSuccess ?></p>
        <?php endif ?>
        <?php if (!is_null($usernameToModify)) : ?>
            <p style="color: <?= $usernameColor ?>;"> <?= (is_null($usernameSuccess)) ? $usernameError : $usernameSuccess ?></p>
        <?php endif ?>
        <?php if (!is_null($passwordToModifyLast) && !is_null(($passwordToModifyNew))) : ?>
            <p style="color: <?= $passwordColor ?>;"> <?= (is_null($passwordSuccess)) ? $passwordError : $passwordSuccess ?></p>
        <?php endif ?>
    </div>
    <?php if ($isMyAccount) : ?>
        <div class="popUpFormular">
            <form action="" method="POST">
                <input type="email" name="changeEmail" id="changeEmail" placeholder="modifier votre email"> <br>
                <input type="text" name="changeUsername" id="changeUsername" placeholder="modifier votre pseudo"> <br>
                <h1 style="color: white;">Modifier votre mot de passe</h1>
                <input type="password" name="changePasswordLast" id="changePasswordLast" placeholder="ancien mot de passe" style="width: 165px;"> <br>
                <input type="password" name="changePasswordNew" id="changePasswordNew" placeholder="nouveau mot de passe" style="width: 165px;"> <br>
                <button>Appliquer ces changement</button>
            </form>
            <button class="exit">Quitter</button>
        </div>
    <?php endif  ?>
    <h1> Tout les article postés : </h1>
    <div class="indexContainer">
        <?php if (is_object($result)) : ?>
            <?php while ($row = $result->fetch_row()) : ?>
                <?php $haveResult = true ?>
                <?php $currentPost = new Post(...$row) ?>
                <div class="container">
				<div class="square">
					<?php if (!empty($currentPost->getImage())) {
						$url = "data:image/jpg;charset=utf8;base64," . base64_encode($currentPost->getImage());
					} else {
						$url = "https://images.unsplash.com/photo-1504610926078-a1611febcad3?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e1c8fe0c9197d66232511525bfd1cc82&auto=format&fit=crop&w=1100&q=80";
					}
					?>	
					<img src="<?= $url ?>" class="mask">
					<div class="h1"><?= $currentPost->getTitle() ?></div>
					<p> <?= (strlen($currentPost->getDescription()) < 300) ? $currentPost->getDescription() : substr($currentPost->getDescription(), 0, 300) . "..." ?> </p>
					<a href="<?= BASE_URL . "/articles-details-" . $currentPost->getIdArticle() ?>"> <button class="button">En savoir plus</button></a>
				</div>
			</div>
            <?php endwhile ?>
        <?php endif ?>
    </div>
    <?php if (!$haveResult) : ?>
        <h1>Cet utilisateur n'a posté aucun article</h1>
    <?php endif ?>
<?php else : ?>
    <h1>Oups, il semblerait qu'il y ait une erreur, veuillez recliquer sur l'onglet "Profil"</h1>
<?php endif ?>




<script>
    let button = document.querySelector(".launchModifyProfile");
    let popUpFormular = document.querySelector(".popUpFormular");
    let exit = document.querySelector(".exit");
    const addPopUpFormular = () => {
        let value = (popUpFormular.style.display == "block") ? "none" : "block";
        popUpFormular.style.display = value;
    };
    button.addEventListener('click', addPopUpFormular);
    exit.addEventListener('click', addPopUpFormular);
</script>