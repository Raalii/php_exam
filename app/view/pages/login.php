<div class="NavbarContainer"></div>
<div class="login">
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="" method="POST">
        <h3>Se connecter</h3>
        <p class="alert" style="color: <?php if (!empty($success)) echo '#ACFCD9';
                                        else echo '#ff8200'; ?>;"> <?php if (!empty($success)) echo $success;
                                                                    else echo $error; ?> </p>
        <label for="username">Email</label>
        <input placeholder="ou Pseudo !" id="username" type="text" name="email">

        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Mot de passe" id="password" name="password">

        <button>Se Connecter</button>
        <div class="social">
            <p> Pas de compte ? <a href="<?= BASE_URL ?>/register">S'inscrire</a> </p>
        </div>
    </form>
</div>
