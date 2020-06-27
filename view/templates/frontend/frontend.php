<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        <?=pageTitle($title);?>
    </title>
    <link rel="icon" href="public/img/mdb-favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="/public/css/bootstrap.css">
    <link rel="stylesheet" href="/public/css/mdb.css">
    <link rel="stylesheet" href="/public/css/blogstyle.css">
</head>

<body onscroll="menuStyle()">

    <?php require('view/templates/frontend/header.php')?>
    <main class="container_fluid special-color-dark p-0">
        <!-- Dynamic content -->
        <?= $content?>
    </main>
    <!-- Footer -->
    <?php require('view/templates/frontend/footer.php')?>
    <!-- jQuery -->
    <script src="public/js/jquery.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="public/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script src="public/js/mdb.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script src="public/js/blogscript.js"></script>

</body>

</html>