<h1>S'incrire</h1>

<form action="" method="post">
    <input type="text" name="text" id="text" placeholder="pseudo">
    <input type="password" name="password" id="password" placeholder="mot de passe">
    <input type="email" name="email" id="email" placeholder="email">
    <button type="submit">Valider</button>
</form>

<h2>Déjà un compte ? <a href="./login.php"> Se connecter</a></h2>

<style>
    form {
        display: flex;
        align-items:flex-start;
        justify-content:flex-start;
        flex-direction: column;
    }


    form button {
        margin-left : 2mm;
    }

    input {
        margin: 0.5rem;
    }
</style>