<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>        <?=pageTitle($title);?></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="/css/style.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/web-animations/2.2.2/web-animations.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/skxr8g05o3zkvvcbie8m6a68jitca2qn9sbf01y4zj41qb0i/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
    

</head>

<body class="grey lighten-3">
    <header>
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container-fluid">
                <!-- Logo -->
                <a class="navbar-brand waves-effect" href="?action=admin"></a>
                    <strong class="blue-text">Jean Forteroche</strong>
                </a>
                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link waves-effect" href="?action=admin">Administration
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="?action=admin&newPost"
                                >Nouveau Chapitre</a>
                        </li>
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="https://www.facebook.com/" class="nav-link waves-effect"
                                target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://twitter.com/" class="nav-link waves-effect" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?action=logout"
                                class="nav-link border border-light rounded waves-effect">
                                <i class="fab fa-sign-out mr-2"></i>Déconnexion
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </nav>
        <!-- Navbar -->

        <!-- Sidebar -->
        <div class="sidebar-fixed position-fixed">

            <a class="logo-wrapper waves-effect">
                <img src="https://mdbootstrap.com/img/logo/mdb-email.png" class="img-fluid" alt="">
            </a>

            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item active waves-effect">
                    <i class="fas fa-chart-pie mr-3"></i>Dashboard
                </a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-user mr-3"></i>Profile</a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-table mr-3"></i>Tables</a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-map mr-3"></i>Maps</a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-money-bill-alt mr-3"></i>Orders</a>
            </div>

        </div>
        <!-- Sidebar -->

    </header>
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">

            <div class="card mb-4 wow fadeIn">

                <div class="card-body d-sm-flex justify-content-between">
                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="https://mdbootstrap.com/docs/jquery/" target="_blank">Home Page</a>
                        <span>/</span>
                        <span>Dashboard</span>
                    </h4>
                    <form class="d-flex justify-content-center">
                        <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
                        <button class="btn btn-primary btn-sm my-0 p" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>

                </div>

            </div>
            <!-- Heading -->
            <?=$content;?>
            <?php

            if(isset($postId)){
                echo
                '
                <div>
                <h2 class="h2 py-2 white-text blue-gradient color-block text-center" >Commentaires</h2>
                <div>';
                echo $post->showPostComments('back');
            }
            ?>



        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer></footer>
    <!--/.Footer-->
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="/js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript" src="/js/blogscript.js"></script>
</body>

</html>