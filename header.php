<?php ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE-edage" />
        <meta name="viewport" content="width=device-width initial-scale=1"/>
        <title><?php if(isset($page_name)){echo $page_name;} ?></title>
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="fontawesome-free-5.12.1-web/css/all.min.css" />
        <?php if( isset($page_name) && $page_name == "signup"){ ?>
        <link rel="stylesheet" href="css/signup.css" />
        <?php }elseif(isset($page_name) && $page_name == "work"){?>
        <link rel="stylesheet" href="work.css" />
        <?php } ?>
        <link rel="stylesheet" href="css/style.css" />
        <script src="..//js/html5shiv.min.js" ></script>
        <script src="..//js/respond.min.js" ></script>

    </head>
    <body>