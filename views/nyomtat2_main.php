<?php $tomb=$viewData;
$utszamlista=$tomb['utszamlista'];
$telepuleslista=$tomb['telepuleslista'];
$megnevlista=$tomb['megnevlista'];
?>
<form action="<?php echo SITE_ROOT?>nyomtat2.php" method="get">
  <h2>Válassza ki a szűrő feltételeket!</h2>
  <label for="utszam">Útszám:</label><select name="utszam" id="utszam">
    <?php for ($i=0;$i<count($utszamlista);$i++){?>
      <option value="<?php echo $utszamlista[$i]['utszam']?>"> <?php echo $utszamlista[$i]['utszam']?> </option>
    <?php }?>
  </select>
  <br><br>
  <label for="telepules">Település:</label><select name="telepules" id="telepules">
    <?php for ($i=0;$i<count($telepuleslista);$i++){?>
      <option value="<?php echo $telepuleslista[$i]['telepules']?>"> <?php echo $telepuleslista[$i]['telepules']?> </option>
    <?php }?>
  </select>
  <br><br>
  <label for="megnevezes">Megnevezés:</label><select name="megnevezes" id="megnevezes">
    <?php for ($i=0;$i<count($megnevlista);$i++){?>
      <option value="<?php echo $megnevlista[$i]['nev']?>"> <?php echo $megnevlista[$i]['nev']?> </option>
    <?php }?>
  </select>
  <br><br>
    <input type="submit" value="Korlátozások listája">
</form>


