<?php
if (empty($title)) $title = "Forum";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/styles/styles.css">
    <title><?= $title ?></title>
</head>

<body>
    <?php if (!empty($displayHeader) && $displayHeader == true) : ?>
        <div class="NavbarContainer"></div>
    <?php else : ?>
        <div class="NavbarContainer">
            <div id="logo">
                <a href="">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/React-icon.svg/1280px-React-icon.svg.png" alt="" width="auto" height="100%">
                </a>

            </div>
            <nav>
                <a href="#">Mon profil</a>
                <a href="#">Works</a>
                <a href="#">Partners</a>
                <a href="#">Price</a>
                <a href="#">Rechercher</a>
            </nav>
            <div id="user-panel">
                <form action="/app/view/pages/login.php" method="POST">
                    <input type="hidden" name="deconnect" value="true">
                    <button class="connect-link" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                <g class="test" fill="#ACFCD9">
                                    <path d="M86,17.2c-26.68202,0 -49.83584,15.26705 -61.23021,37.52422c-1.03288,1.83276 -0.97917,4.08397 0.13995,5.86538c1.11912,1.78141 3.12391,2.80691 5.22334,2.67187c2.09943,-0.13504 3.95633,-1.40892 4.83801,-3.31902c9.4979,-18.55269 28.71386,-31.27578 51.02891,-31.27578c31.73133,0 57.33333,25.60201 57.33333,57.33333c0,31.73133 -25.60201,57.33333 -57.33333,57.33333c-22.31504,0 -41.53101,-12.72309 -51.02891,-31.27578c-0.88168,-1.9101 -2.73858,-3.18399 -4.83801,-3.31902c-2.09943,-0.13504 -4.10422,0.89047 -5.22334,2.67187c-1.11912,1.78141 -1.17284,4.03262 -0.13995,5.86538c11.39437,22.25717 34.54819,37.52422 61.23021,37.52422c37.92867,0 68.8,-30.87133 68.8,-68.8c0,-37.92867 -30.87133,-68.8 -68.8,-68.8zM80.21067,57.27734c-2.33302,0.00061 -4.43306,1.41473 -5.31096,3.57628c-0.8779,2.16155 -0.3586,4.6395 1.31331,6.26668l13.14636,13.14636h-66.42604c-2.06765,-0.02924 -3.99087,1.05709 -5.03322,2.843c-1.04236,1.78592 -1.04236,3.99474 0,5.78066c1.04236,1.78592 2.96558,2.87225 5.03322,2.843h66.42604l-13.14636,13.14636c-1.49778,1.43802 -2.10113,3.5734 -1.57735,5.5826c0.52378,2.0092 2.09284,3.57826 4.10204,4.10204c2.0092,0.52378 4.14458,-0.07957 5.5826,-1.57735l22.42943,-22.42942c1.42382,-1.08614 2.25843,-2.77513 2.25623,-4.56593c-0.0022,-1.7908 -0.84095,-3.47774 -2.26743,-4.56038l-22.41823,-22.41823c-1.07942,-1.10959 -2.56163,-1.73559 -4.10964,-1.73568z"></path>
                                </g>
                            </g>
                        </svg>
                        <h5>Se déconnecter</h5>
                    </button>
                </form>
            </div>
        </div>
        <div class="RealContent"></div>
    <?php endif ?>

    <style>

    </style>