<?php 
$tomb=$viewData['lista'];
?>

<h2> Forgalom korlátozások: </h2>
Ide kellene egy dátum intervallum szűrő AJAX megoldással: 

<table>
<tr>
    <th>Munka</th>
    <th>Darab</th>    																		
</tr>
		
<?php 

for($i=0;$i<count($tomb);$i++){   ?> 
    
<tr>
    <td><?php echo($tomb[$i]['munka'])?></td>
    <td><?php echo($tomb[$i]['darab'])?></td>    							
</tr>               
<?php } ?>
</table>

Ide pedig kell egy oszlopdiagram.