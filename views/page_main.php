.<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Forgalomkorlátozások</title>
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT?>css/main.css">
        <?php if($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="'.$viewData['style'].'">'; ?>
        <script type="text/javascript" src = "<?php echo SITE_ROOT?>js/jquery.min.js"></script>
        <script type="text/javascript" src = "<?php echo SITE_ROOT?>js/lekerdezo_listazo.js"></script>
        <script type="text/javascript" src = "<?php echo SITE_ROOT?>js/objektumorientalt.js"></script>
    </head>
    <body>
        <header>
            <div id="user"><em>
            <?php if(isset($_SESSION['login'])&&$_SESSION['userid']>0) { ?>Bejelentkezett: <strong><?= $_SESSION['userlastname']." ".$_SESSION['userfirstname']." (".$_SESSION['login'].")" ?></strong><?php } ?>
            </em></div>
            
        </header>
        <nav>
            <?php echo Menu::getMenu($viewData['selectedItems']); ?>
        </nav>
        <aside>
                <p>Telefonos ügyfélszolgálat: 0620/555555</p>
        </aside>
        <section>
            <?php if($viewData['render']) include($viewData['render']); ?>
        </section>
        <footer>&copy; Forgalomkorlátozások. All rights reserved. <?= date("Y") ?></footer>
    </body>
</html>
