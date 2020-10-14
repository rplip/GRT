<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="https://fonts.googleapis.com/css2?family=Rokkitt:wght@400;500;600;700&display=swap" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>

    <title>GRT GAZ</title>
</head>
<body>

<div id="buttonBackToTop"><<</div>

<!-- NavBar version desktop-->


<div class="container" id="navbar">
    <a href="/grtgaz-preprod">
        <div class="row align-items-center align-self-center justify-content-between" id="header_logo">
            <div class="col-lg-9 col-12 logo_left">
                Les gaz renouvelables, l'énergie de tous les possibles.
            </div>
            <div class="col-lg-3 logo_right d-none d-lg-block ">
                <p class="d-flex header__right">
                    <span class="header__right--text">Campagne soutenue par</span> 
                    <img src="/grtgaz-preprod/wp-content/themes/grt/assets/images/minilogoGRT.png" alt="Logo GRT Gaz" class="header__right--img">
                </p>
            </div>
        </div>
    </a>
    <?php include 'navbar.php' ?>
</div>



<!-- NavBar version mobile-->

<nav class="navbar navbar-expand-lg d-lg-none" id="navbarMobile">
    
    <button id="burgerButton" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <div class="col-sm-auto col-12 separator">
                    <a href="/grtgaz-preprod/#nslgr">
                        <span class="navTitle">Les bienfaits</span>
                    </a>
                </div>
            </li>
            <li class="navSeparator">
            </li>
            <li class="nav-item">
                <div class="col-sm-auto col-12 separator">
                    <a href="/grtgaz-preprod/#abcdaire">
                    <span class="navTitle"><span style="letter-spacing: .1em;">L'</span>ABCéDaire</span>
                    </a>
                </div>
            </li>
            <li class="navSeparator">
            </li>
            <li class="nav-item">
                <div class="col-sm-auto col-12">
                        <span class="navTitle">Campagne</span>
                </div>
            </li>
            <li class="navSeparator">
            </li>
            <li class="nav-item">
                <div class="col-sm-auto col-12">
                    <a data-toggle="modal" data-target="#modalSearchInputMobile">
                        <span class="navTitle">Recherche</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <img src="/grtgaz/wp-content/themes/grt/assets/images/logo.png" alt="Icone de recherche" class="navbar-brand">
</nav>