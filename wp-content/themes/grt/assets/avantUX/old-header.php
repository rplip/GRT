<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>

    <title>GRT GAZ</title>
</head>
<body>
<i id="buttonBackToTop" class="fal fa-angle-double-up"></i>

<!-- NavBar version desktop-->


<div class="container" id="navbar">
    <a href="http://extranetoko.fr/grtgaz">
        <div class="row align-items-center align-self-center justify-content-between" id="header_logo">
            <div class="col-sm-9 col-12 logo_left">
                Les gaz renouvelables, l'énergie de tous les possibles.
            </div>
            <div class="col-sm-3 col-11 logo_right d-none d-sm-block">
                <img src="/grtgaz/wp-content/themes/grt/assets/images/logo.png" alt="Logo GRT Gaz">
            </div>
        </div>
    </a>
    
    <div class="row justify-content-start d-none d-sm-flex" id="header_nav">
        <div class="col-sm-auto col-4 separator">
            <a href="http://extranetoko.fr/grtgaz/#nslgr">
                <span class="navTitle">Les bienfaits</span><br><span class="nav-letters">des gaz renouvelables</span>
            </a>
        </div>
        <div class="col-sm-auto col-4 separator">
            <a href="http://extranetoko.fr/grtgaz/#abcdaire">
            <span class="navTitle"><span style="letter-spacing: .1em;">l'</span>abcédaire</span><br><span class="nav-letters">des gaz renouvelables</span>
            </a>
        </div>
        <div class="col-sm-auto col-4">
            <span class="navTitle">Campagne</span><br><span class="nav-letters">Lorem ipsoum</span>
        </div>
        <div class="col-sm-4 col-4" id="completesearchbar">
            <span class="navTitle">
                <form action="" method="get">
                <input type="text" name="s" placeholder="Tapez votre recherche.." class="" id='inputsearch'>
                <img src="wp-content/themes/grt/assets/images/loupe.png" alt="" id="loupesearch">
                </form>
            </span>
        </div>
    </div>
    

</div>



<!-- NavBar version mobile-->

<nav class="navbar navbar-expand-lg d-sm-none" id="navbarMobile">
    
    <button id="burgerButton" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <div class="col-sm-auto col-12 separator">
                    <a href="#nslgr">
                        <span class="navTitle">Les bienfaits</span> <span class="nav-letters">des gaz renouvelables</span>
                    </a>
                </div>
            </li>
            <li class="navSeparator">
            </li>
            <li class="nav-item">
                <div class="col-sm-auto col-12 separator">
                    <a href="#abcdaire">
                    <span class="navTitle"><span style="letter-spacing: .1em;">L'</span>ABCéDaire</span> <span class="nav-letters">des gaz renouvelables</span>
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
                    <span class="navTitle">Espace Presse</span>
                </div>
            </li>
        </ul>
    </div>
    <img src="/grtgaz/wp-content/themes/grt/assets/images/logo.png" alt="Icone de recherche" class="navbar-brand">
</nav>