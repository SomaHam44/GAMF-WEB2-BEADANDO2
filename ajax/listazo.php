<?php
  switch($_POST['op']) {
    case 'telepules':
      $eredmeny = array("lista" => array());
      try {
        $dbh = new PDO('mysql:host=localhost;dbname=forgalomkorlatozas', 'root', '',
                      array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        $stmt = $dbh->query("select distinct telepules from korlatozas");
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $eredmeny["lista"][] = array("id" => $row['telepules']);
              
        }
      }
      catch(PDOException $e) {
      }
      echo json_encode($eredmeny);
      break;
    case 'mertek':
      $eredmeny = array("lista" => array());
      try {
        $dbh = new PDO('mysql:host=localhost;dbname=forgalomkorlatozas', 'root', '',
                      array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        $stmt = $dbh->prepare("SELECT DISTINCT mertekid, mertek.nev from korlatozas inner join mertek on korlatozas.mertekid=mertek.id where korlatozas.telepules = :id");
        $stmt->execute(Array(":id" => $_POST["id"]));
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $eredmeny["lista"][] = array("id" => $row['mertekid'], "nev" => $row['nev']);
              
        }
      }
      catch(PDOException $e) {
      }
      echo json_encode($eredmeny);
      break;
    case 'munka':
      $eredmeny = array("lista" => array());
      try {        
        $dbh = new PDO('mysql:host=localhost;dbname=forgalomkorlatozas', 'root', '',
                      array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        $stmt = $dbh->prepare("SELECT korlatozas.az, megnevezes.nev, korlatozas.mettol, korlatozas.meddig from korlatozas inner join megnevezes on megnevezes.id=korlatozas.megnevid where korlatozas.telepules = :id");
        $stmt->execute(Array(":id" => $_POST["id"]));
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $eredmeny["lista"][] = array("id" => $row['az'], "nev" => $row['nev'], "kezdes" => $row['mettol'], "vegzes" => $row['meddig']);
        }
      }

    catch(PDOException $e) {
    }
    echo json_encode($eredmeny);
    break;

    case 'info':
      $eredmeny = array("id" => "", "telepules" => "", "utszam" => "", "megnevezes" => "", "mertek" => "", "mettol" => "", "meddig" => "");
      try {
        $dbh = new PDO('mysql:host=localhost;dbname=forgalomkorlatozas', 'root', '',
                      array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        $stmt = $dbh->prepare("select korlatozas.az, korlatozas.mettol, korlatozas.meddig, korlatozas.telepules, korlatozas.utszam, korlatozas.kezdet, korlatozas.veg, megnevezes.nev as megnevnev, mertek.nev as merteknev from (korlatozas inner join megnevezes on korlatozas.megnevid=megnevezes.id) inner join mertek on korlatozas.mertekid=mertek.id where korlatozas.az= :id");
        $stmt->execute(Array(":id" => $_POST["id"]));
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $eredmeny = array("id" => $row['az'], "telepules" => $row['telepules'], "utszam" => $row['utszam'], "kezdet" => $row['kezdet'], "veg" => $row['veg'], "megnevezes" => $row['megnevnev'], "mertek" => $row['merteknev'], "mettol" => $row['mettol'], "meddig" => $row['meddig']);
        }
      }
      catch(PDOException $e) {
      }
      echo json_encode($eredmeny);
      break;
      
    
  }
?>
