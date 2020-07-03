<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        <?=pageTitle($title);?>
    </title>
    <link rel="apple-touch-icon" sizes="180x180" href="/public/img//apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/public/img/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/public/img/icon/favicon-16x16.png">
    <link rel="manifest" href="/public/manifest/site.webmanifest">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/mdb.css">
    <link rel="stylesheet" href="/public/css/blogstyle.css">
</head>

<body onscroll="menuStyle()">

    <?php require('view/templates/frontend/header.php')?>
    <main class="container_fluid special-color-dark pb-5 p-0">
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