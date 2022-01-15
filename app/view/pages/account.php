<?php
require "../../models/User.php";
session_start();

require "../../controllers/_account.php";
require "../include/header.php";
?>

<?php if (!is_null($UserToShow)) : ?>
    <div class="AccountContent">
        <h1><?= ($isMyAccount) ? "Mon profil <br> Nom actuel : " . $UserToShow->getUsername()  : "Profil de " . $UserToShow->getUsername()  ?></h1>

        <p>
            Nombre de post : <?= checkNbrOfPost($UserToShow->getId()) ?>
        </p>

        <p>
            Grade : <?= $UserToShow->getType() ?>
        </p>

        <?php if (!$isMyAccount) :  ?>
            <p>
                Le contacter : <?= $UserToShow->getEmail() ?>
            </p>
        <?php else : ?>
            <p>Mon adresse email : <?= $UserToShow->getEmail() ?> </p>
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
            <form action="http://localhost/app/view/pages/account.php?profile=<?= $idOfProfilToShow ?>" method="POST">
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