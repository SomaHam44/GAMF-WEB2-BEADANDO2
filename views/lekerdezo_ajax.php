<?php
  switch($_POST['op']) {
    case 'utszam':
      $eredmeny = array("lista" => array());
      try {
        $dbh = new PDO('mysql:host=localhost;dbname=forgalomkorlatozas', 'root', '',
                      array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        $stmt = $dbh->query("SELECT distinct utszam from korlatozas");
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $eredmeny["lista"][] = array("utszam" => $row['utszam']);
        }
      }
      catch(PDOException $e) {
      }
      echo json_encode($eredmeny);
      break;
    case 'telepules':
      $eredmeny = array("lista" => array());
      try {
        $dbh = new PDO('mysql:host=localhost;dbname=forgalomkorlatozas', 'root', '',
                      array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        $stmt = $dbh->prepare("SELECT distinct telepules from korlatozas where utszam = :utszam");
        $stmt->execute(Array(":telepules" => $_POST["telepules"]));
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $eredmeny["lista"][] = array("telepules" => $row['telepules']);
        }
      }
      catch(PDOException $e) {
      }
      echo json_encode($eredmeny);
      break;
    case 'megnevezes':
      $eredmeny = array("lista" => array());
      try {
        $dbh = new PDO('mysql:host=localhost;dbname=forgalomkorlatozas', 'root', '',
                      array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        $stmt = $dbh->prepare("SELECT DISTINCT korlatozas.megnevid, megnevezes.nev FROM korlatozas INNER JOIN megnevezes ON korlatozas.megnevid=megnevezes.id where telepules = :telepules");
        $stmt->execute(Array(":megnevid" => $_POST["megnevid"]));
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $eredmeny["lista"][] = array("megnevid" => $row['megnevid'], "nev" => $row['nev']);
        }
      }
      catch(PDOException $e) {
      }
      echo json_encode($eredmeny);
      break;
    case 'info':
      $eredmeny = array("nev" => "", "cim" => "", "tel" => "", "email" => "");
      try {
        $dbh = new PDO('mysql:host=localhost;dbname=forgalomkorlatozas', 'root', '',
                      array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        $stmt = $dbh->prepare("SELECT korlatozas.telepules, korlatozas.utszam, korlatozas.kezdet, korlatozas.veg, megnevezes.nev as megnevezes, 
        mertek.nev as mertek, korlatozas.sebesseg, korlatozas.mettol, korlatozas.meddig FROM `korlatozas` 
        INNER JOIN megnevezes on korlatozas.megnevid=megnevezes.id 
        INNER JOIN mertek ON korlatozas.mertekid=mertek.id  where (megnevid = :megnevid AND telepules=:telepules)");
        $stmt->execute(Array(":id" => $_POST["id"]));
        $ret=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $eredmeny["lista"][] = array("telepules" => $ret['telepules'], "utszam" => $row['utszam'], 
        "kezdet" => $row['kezdet'], "veg" => $row['veg'],"megnevezes" => $row['megnevezes'],"mertek" => $row['mertek'],
        "sebesseg" => $row['sebesseg'],"veg" => $row['mettol'],"veg" => $row['meddig']);        
      }
      catch(PDOException $e) {
      }
      echo json_encode($eredmeny);
      break;
  }
?>
