<div class="NavbarContainer" style="z-index: 0;"></div>
<div class="register">
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="" method="POST">
        <h3>S'inscrire</h3>
        <p class="alert" style="color: <?php if (!empty($success)) echo '#ACFCD9';
                                        else echo '#ff8200'; ?>;"> <?php if (!empty($success)) echo $success;
                                                                    else echo $error; ?> </p>
        <label for="username">Email</label>
        <input placeholder="Adresse Email" id="username" type="email" name="email" required>
        <label for="username">Pseudo</label>
        <input placeholder="Pseudo" id="username" type="Pseaudo" name="username" required>

        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Mot de passe" id="password" name="password" onchange="PassCheck()" required>
        <label for="vpassword">Confirmer le mot de passe</label>
        <input type="password" placeholder="Confirmer le mot de passe" id="vpassword" name="vpassword"  onchange="PassCheck()" required>

        <button type="submit" id="submit">S'inscrire</button>
        <div class="social">
            <p> Déjà un compte ? <a href="<?= BASE_URL ?>/login">Se connecter</a> </p>
        </div>
    </form>
</div>


<script>
    let checked = false;
    let password = document.getElementById('password');
    let vpassword = document.getElementById('vpassword');
    let button = document.getElementById("submit");
    function PassCheck() {
        if (!checked) {
            checked = true;
            return;
        }
        let message = document.querySelector(".alert");
        console.log(message);
        if (password.value != vpassword.value) {
            button.disabled = true;
            button.innerHTML = "Impossible de s'inscrire"
            button.style.color = '#5f5f5f'
            message.innerHTML = "Les mot de passe ne sont pas pareils"
            message.style.color = '#ff8200';
        } else {
            button.disabled = false;
            button.innerHTML = "S'inscrire"
            button.style.color = '#e3f2fd'
            message.innerHTML = "Les mot de passe sont pareils"
            message.style.color = '#ACFCD9';
        }
    }
</script>

