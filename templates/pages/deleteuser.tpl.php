<?php
    include 'db_connect.php';
    $stmt = $connect->prepare('DELETE from munkaado where mhelyid = :mhelyid');
    $stmt->execute(array(':mhelyid' => $_GET["mhelyid"]));
    header("Location: ./templates/pages/");  // Go to the main folder
?>