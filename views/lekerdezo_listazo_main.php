<?php 
$tomb=$viewData['lista'];
?> 
<div id='gombok'>
  <form action="<?php echo SITE_ROOT?>pdf/pdf.php" method="get">
    <input type="submit" value="Lista nyomtatás">
  </form>
  <a id='gomb' href="<?php echo SITE_ROOT?>js/lekerdezo_listazo_main.html" 
  target="popup" onclick="window.open('<?php echo SITE_ROOT?>js/lekerdezo_listazo_main.html','popup','width=800,height=500');return false">
    <button> Részetes nyomtatás</button>
  </a>
  <br><br><br>
</div>

<h2> Forgalom korlátozások: </h2>

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

