<!DOCTYPE html>

<html>

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>Coin Collector's Database: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Coin Collector's Database</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <div>
                    <img img alt="Coins" width= 150px height=100px src="/img/super_mario_coins.png"/>
                    <a href="/"><font size ="8" face="verdana"  color="green">Coins</font></a>
                    <img img alt="Coins" width= 150px height=100px src="/img/super_mario_coins.png"/>
                </div>
            </div>

            <div id="middle">