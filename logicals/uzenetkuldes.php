<?php


try {
        $dbh = new PDO('mysql:host=localhost;dbname=webprog', 'webprog', 'GJ8n08_xnnbsi',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        

        if ($_SESSION){
            $sqlInsert = "INSERT INTO `uzenetek`(`nev`, `uzenet`) VALUES ('{$_SESSION['csn']} {$_SESSION['un']}', '{$_POST['uzenet']}')";
            $sth = $dbh->prepare($sqlInsert);
            $sth->execute();
        }
        else{
            $sqlInsert = "INSERT INTO `uzenetek`(`nev`, `uzenet`) VALUES ('Vendég', '{$_POST['uzenet']}')";
            $sth = $dbh->prepare($sqlInsert);
            $sth->execute();
        }
    }
    catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
    }     

?>