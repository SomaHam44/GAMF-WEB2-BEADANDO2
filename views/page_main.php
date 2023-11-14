.<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Forgalomkorlátozás</title>
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT?>css/main.css">
        <?php if($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="'.$viewData['style'].'">'; ?>
    </head>
    <body>
        <header>
            <div id="user"><em>
            <?php if(isset($_SESSION['login'])&&$_SESSION['userid']>0) { ?>Bejelentkezett: <strong><?= $_SESSION['userlastname']." ".$_SESSION['userfirstname']." (".$_SESSION['login'].")" ?></strong><?php } ?>
            </em></div>
            <h1 class="header">Forgalomkorlátozó</h1>
        </header>
        <nav>
            <?php echo Menu::getMenu($viewData['selectedItems']); ?>
        </nav>
        <aside>
                <p>Forgalom korlátozási kérdések esetén: 0620/555555</p>
        </aside>
        <section>
            <?php if($viewData['render']) include($viewData['render']); ?>
        </section>
        <footer>&copy; Forgalomkorlátozás. All rights reserved. <?= date("Y") ?></footer>
    </body>
</html>
