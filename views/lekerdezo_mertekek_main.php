<?php 
$tomb=$viewData['lista'];

$url = "http://localhost/web2_b2/models/merteklekerdezo_model.php";

if(isset($_POST['id']))
{
  // Felesleges szóközök eldobása
  $_POST['id'] = trim($_POST['id']);
  $_POST['nev'] = trim($_POST['nev']);
  
  // Ha nincs id és megadtak minden adatot (név), akkor beszúrás
  if($_POST['id'] == "" && $_POST['nev'] != "" )
  {
      $data = Array("n" => $_POST["nev"]);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);
  }
  
  // Ha nincs id de nem adtak meg minden adatot
  elseif($_POST['id'] == "")
  {
    $result = "Hiba: Hiányos adatok!";
  }
  
  // Ha van id, amely >= 1, és megadták legalább az egyik adatot (név), akkor módosítás
  elseif($_POST['id'] >= 1 && ($_POST['nev'] != ""))
  {
      $data = Array("id" => $_POST["id"], "n" => $_POST["nev"]);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);
  }
  
  // Ha van id, amely >=1, de nem adtak meg legalább az egyik adatot
  elseif($_POST['id'] >= 1)
  {
      $data = Array("id" => $_POST["id"]);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);
  }
  
  // Ha van id, de rossz az id, akkor a hiba kiírása
  else
  {
    echo "Hiba: Rossz azonosító (Id): ".$_POST['id']."<br>";
  }
}

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$tabla = curl_exec($ch);
curl_close($ch);
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


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>REST GYAKORLAT</title>
</head>
<body>
    <?= $result ?>
    <h1>Mértékek:</h1>
    <?= $tabla ?>
    <br>
    <h2>Módosítás / Beszúrás</h2>
    <form method="post">
    Id: <input type="text" name="id"><br><br>
    Név: <input type="text" name="nev" maxlength="45"> 
    <input type="submit" value = "Küldés">
    </form>
</body>
</html>
