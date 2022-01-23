<?php
require "./vendor/autoload.php";
require "./app/models/User.php";
session_start();
require './app/functions.php';




$router = new AltoRouter();

$router->map("GET",  BASE_URL . "/", function () {
	redirectUserAccordingToStateOfSession();
	require "./app/models/Post.php";
	require "./app/view/include/header.php";
	require "./app/controllers/_home.php";
	require "./app/view/pages/home.php";
});

$router->map("GET|POST",  BASE_URL . "/login", function () {
	$title = "Se connecter";
	$displayHeader = true;
	require './app/controllers/_login.php';

	if (isset($_SESSION['auth'])) :
		header("Location: " . BASE_URL . "/");
		die();
	endif;

	require './app/view/include/header.php';
	require "./app/view/pages/login.php";
});


$router->map("GET|POST",  BASE_URL . "/register", function () {

	$title = "S'inscrire";
	$displayHeader = true;
	require './app/controllers/_register.php';
	if (isset($_SESSION['auth'])) :
		header("Location: " . BASE_URL . "/");
		die();
	endif;

	require './app/view/include/header.php';
	require "./app/view/pages/register.php";
});


$router->map("GET|POST",  BASE_URL . "/articles-details-[i:idArticle]", function ($idArticle) {
	redirectUserAccordingToStateOfSession();
	require "./app/models/Post.php";
	require "./app/models/Post_User.php";
	require "./app/view/include/header.php";
	require "./app/controllers/_postDetail.php";
	require "./app/view/pages/postDetail.php";
});

$router->map("GET|POST",  BASE_URL . "/profile-[i:idOfProfilToShow]", function ($idOfProfilToShow) {
	redirectUserAccordingToStateOfSession();
	require "./app/models/Post.php";
	require "./app/view/include/header.php";
	require "./app/controllers/_account.php";
	require "./app/view/pages/account.php";
});


$router->map("GET|POST",  BASE_URL . "/my-profile", function () {
	redirectUserAccordingToStateOfSession();
	$idOfProfilToShow = $_SESSION['auth']->getId();
	require "./app/models/Post.php";
	require "./app/view/include/header.php";
	require "./app/controllers/_account.php";
	require "./app/view/pages/account.php";
});



$router->map("GET|POST",  BASE_URL . "/articles/new", function () {
	redirectUserAccordingToStateOfSession();
	require "./app/view/include/header.php";
	require "./app/controllers/_newPost.php";
	require "./app/view/pages/newPost.php";
});


$router->map("GET|POST",  BASE_URL . "/myArticles", function () 	{
	redirectUserAccordingToStateOfSession();
	require "./app/models/Post.php";
	require "./app/view/include/header.php";
	require "./app/controllers/_myArticles.php";
	require "./app/view/pages/myArticles.php";
});


$router->map("GET|POST",  BASE_URL . "/myArticles/edit", function () {
	redirectUserAccordingToStateOfSession();
	require "./app/models/Post.php";
	require "./app/controllers/_edit.php";
	require "./app/view/include/header.php";
	require "./app/view/pages/edit.php";
});


$router->map("GET|POST",  BASE_URL . "/admin", function () {
	redirectUserAccordingToStateOfSession();
	require "./app/models/Post.php";
	require "./app/models/Post_User.php";
	require "./app/controllers/_admin.php";
	require "./app/view/include/header.php";
	require "./app/view/pages/admin.php";
});





$match = $router->match();


if (!empty($match)) {
	call_user_func_array($match['target'], $match['params']);
	require "./app/view/include/footer.php";
} else {
	$displayHeader = true;
	require "./app/view/include/header.php";
	?> <h1>Erreur 404</h1>
<?php
require "./app/view/include/footer.php";
}
?>