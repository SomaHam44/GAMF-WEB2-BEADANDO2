<?php 
$tomb=$viewData['lista'];
?>
<h2> Vélemények </h2>
<table>
<tr>
    <th>ID</th>
    <th>Üzenet</th>
    <th>Felhasználó</th>
    <th>Időpont</th>
    <th>Töröl</th>		    																			
</tr>
		
<?php 
for($i=0;$i<count($tomb);$i++){    
    ?>
<tr>
    <td><?php echo($tomb[$i]['hirId'])?></td>
    <td><?php echo($tomb[$i]['tartalom'])?></td>
    <td><?php echo($tomb[$i]['login'])?></td>
    <td><?php echo($tomb[$i]['idopont'])?></td>
    <td><form action="<?= SITE_ROOT ?>admintorol" method="post">
    <input type="hidden" name="delID" value="<?php echo  $tomb[$i]['hirId']?>">
    <input type="submit" name="submit" value="Törlés">
    </form></td>							
</tr>               
<?php } ?>
</table>
