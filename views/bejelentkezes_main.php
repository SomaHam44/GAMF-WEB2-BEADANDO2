<h2>Bejelentkezés</h2>  
<form action="<?= SITE_ROOT ?>belepteto" method="post">
    <fieldset>                  
        <label for="login">Felhasználónév:</label><input type="text" name="login" id="login" required pattern="[a-zA-Z][\-\.a-zA-Z0-9_]{3}[\-\.a-zA-Z0-9_]+"><br>
        <label for="password">Jelszó:</label><input type="password" name="password" id="password" required pattern="[\-\.a-zA-Z0-9_]{4}[\-\.a-zA-Z0-9_]+"><br>
        <input type="submit" value="Küldés">
    </fieldset>
</form>

<h2>Regisztráció</h2>
<form action = "<?= SITE_ROOT ?>regisztracio" method="post">
    <fieldset>              
        <label for="csaladi_nev">Vezetéknév:</label><input type="text" name="csaladi_nev" required><br><br>
        <label for="utonev">Keresztnév:</label><input type="text" name="utonev" required><br><br>
        <label for="login">Felhasználónév:</label><input type="text" name="login" required><br><br>
        <label for="password">Jelszó:</label><input type="password" name="password"  required><br><br>
        <input type="submit" name="regisztracio" value="Küldés">                
    </fieldset>
</form>

<h2><br><?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?><br></h2>
