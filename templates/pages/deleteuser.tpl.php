<?php
  include __DIR__ . '/../../db.php';

    $stmt = $pdo->prepare('DELETE from munkaado where mhelyid = :mhelyid');
    $stmt->execute(array(':mhelyid' => $_GET["mhelyid"]));
    header("Location: .");  // Go to the main folder
?>

