<?php 
$tomb=$viewData['lista'];
?>

<h2> Forgalom korlátozások: </h2>
Ide kellene egy szűrő AJAX megoldással: 
- egy autocomplete mező, ahol megadhatom a települést
- és egy dátum választó, ami a felületen szűr a dátumra (a megadott dátum a "mettől-meddig" intervallumba essen.)

<table>
<tr>
    <th>Település</th>
    <th>Útszám</th>
    <th>Kezdet</th>
    <th>Vég</th>    
    <th>Megnevezés</th>	
    <th>Mérték</th>				
    <th>Sebesség</th>
    <th>Mettől</th>
    <th>Meddig</th>																			
</tr>
		
<?php 

for($i=0;$i<count($tomb);$i++){   ?> 
    
<tr>
    <td><?php echo($tomb[$i]['telepules'])?></td>
    <td><?php echo($tomb[$i]['utszam'])?></td>
    <td><?php echo($tomb[$i]['kezdet'])?></td>
    <td><?php echo($tomb[$i]['veg'])?></td>
    <td><?php echo($tomb[$i]['megnevezes'])?></td>
    <td><?php echo($tomb[$i]['mérték'])?></td>
    <td><?php echo($tomb[$i]['sebesseg'])?></td>
    <td><?php echo($tomb[$i]['mettol'])?></td>
    <td><?php echo($tomb[$i]['meddig'])?></td>								
</tr>               
<?php } ?>
</table>

Ide pedig kell egy pdf nyomtatás funkció, ami a fejlécben megjeleníti a szűrési feltételeket, és táblázatban a szűrt listát.