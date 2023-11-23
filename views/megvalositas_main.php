<?php 
$tomb=$viewData['lista'];
?>

<head>
<!--<script type = "text/javascript" src = "jquery.min.js"></script>
<script type = "text/javascript" src = "megvalositas.js"></script>
-->
</head>
<h2> Megvalosítás: </h2>

<form action="<?= SITE_ROOT ?>megvalositas" method="post">
      <label>Település:</label><input type="text" id="telepules" required>
      <br><br>
      <label>Megnevezés:</label><input type="text" id="megnevezes" required>
      <br><br>
      <label>Mérték:</label><input type="text" id="mertek" required>
      <br><br>
      <input type="submit" id="gomb" value="Küldés">
      <br><br>
</form>

<table>
<tr>
    <th>Útszám</th>
    <th>Kezdet</th>
    <th>Vég</th>					
    <th>Település</th>																			
    <th>Mettől</th>																			
    <th>Meddig</th>																			
    <th>Megnevezés</th>																			
    <th>Mérték</th>
    <th>Sebesség</th>																			
</tr>
		
<?php 

for($i=0;$i<count($tomb);$i++){   ?> 
    
<tr>
    <td><?php echo($tomb[$i]['utszam'])?></td>
    <td><?php echo($tomb[$i]['kezdet'])?></td>
    <td><?php echo($tomb[$i]['veg'])?></td>
    <td><?php echo($tomb[$i]['telepules'])?></td>										
    <td><?php echo($tomb[$i]['mettol'])?></td>										
    <td><?php echo($tomb[$i]['meddig'])?></td>										
    <td><?php echo($tomb[$i]['nev'])?></td>										
    <td><?php echo($tomb[$i]['nev2'])?></td>										
    <td><?php echo($tomb[$i]['sebesseg'])?></td>										
</tr>               
<?php } ?>
</table>
