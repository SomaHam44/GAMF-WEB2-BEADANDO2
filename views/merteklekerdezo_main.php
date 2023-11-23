<?php 
$tomb=$viewData['lista'];
?>

<head>
</head>
<h2> Mértékek lekérdezése: </h2>

<form action="<?= SITE_ROOT ?>merteklekerdezo" method="post">
        <label>Új mérték: </label><input type="text" required>
      <input type="submit" id="gomb" value="Beszúrás">
      <br><br>
</form>

<table>
<tr>
    <th>Mérték neve</th>
    <th>Módosítás</th>
    <th>Törlés</th>																							
</tr>
		
<?php 

for($i=0;$i<count($tomb);$i++){   ?> 
    
<tr>
    <td><?php echo($tomb[$i]['nev'])?></td>
    <td><input type="submit" id="gomb" value="Módosítás"></td>
    <td><input type="submit" id="gomb" value="Törlés"></td>								
</tr>               
<?php } ?>
</table>
