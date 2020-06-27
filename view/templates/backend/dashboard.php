<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=pageTitle($title);?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="/public/img//apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/public/img/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/public/img/icon/favicon-16x16.png">
    <link rel="manifest" href="/public/manifest/site.webmanifest">
    <link href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet" >
    <link href="/public/css/bootstrap.css" rel="stylesheet">
    <link href="/public/css/mdb.css" rel="stylesheet">
    <link href="/public/css/style.css" rel="stylesheet">
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
                <a class="navbar-brand waves-effect" href="?view=admin"></a>
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
                            <a class="nav-link waves-effect" href="?view=admin">Administration
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="?view=admin&newPost"
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
                            <a href="?view=admin&action=logout"
                                class="nav-link border border-light rounded waves-effect">
                                <i class="fab fa-sign-out mr-2"></i>Déconnexion
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </nav>
        <!-- Navbar -->
    </header>
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <div class="card mb-4 wow fadeIn">
                <div class="card-body">
                    <h4 id="header"class="mb-2 mb-sm-0 pt-1">
                        <a href="/" target="_blank">Visiter l'accueil</a>
                        <span>/</span>
                        <span>www.JeanBlog.malahrim.fr</span>
                    </h4>
                </div>
            </div>
            <!-- Heading -->
            <?php 
            echo $content;
            if(isset($postId)){
                echo
                '
                <div>
                <h2 class="h2 py-2 white-text blue-gradient color-block text-center" >Commentaires</h2>
                <div>';
                echo $post->showPostComments();
            }
            ?>
        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer>
        <?php require_once('view/templates/frontend/footer.php')?>
    </footer>
    <!--/.Footer-->
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="public/js/jquery-3.4.1.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="public/js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript" src="public/js/blogscript.js"></script>
</body>

</html>