<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>
        <?=pageTitle($title);?>
        </title>
        <!-- MDB icon -->
        <link rel="icon" href="public/img/mdb-favicon.ico" type="image/x-icon">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <!-- Material Design Bootstrap -->
        <link rel="stylesheet" href="public/css/mdb.min.css">
        <!-- Your custom styles (optional) -->
        <link rel="stylesheet" href="public/css/blogstyle.css">
    </head>
    <body onscroll="menuStyle()">
        <?php require('views/templates/frontend/header.php')?>
        <section class="container_fluid special-color-dark p-0">
        <!--/Dynamic content-->
            <?= $content?>
        </section>
        <!-- Footer -->
        <?php require('views/templates/frontend/footer.php')?>
            <!-- jQuery -->
    <script  src="public/js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script  src="publicjs/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script  src="public/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script  src="public/js/mdb.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script  src="public/js/blogscript.js"></script>
        <!-- Called by Indexview - postsView - postView -->
        </body>


</html>