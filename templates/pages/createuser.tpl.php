<?php
    include 'db_connect.php';
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        if($_POST['nev']!=""){
            $stmt = $pdo->prepare('INSERT into munkaado (nev, telepules) VALUES (:nev, :telepules)');
            $stmt->execute(array(':nev' => $_POST['nev'],':telepules' => $_POST['telepules'],));
        }
        header("Location: .");  // Go to the main folder
    }
?>
<form method="POST">
    <div class="col-md-6">
        <input type="text" name="nev" class="form-control" placeholder="nev"><br />
        <input type="text" name="telepules" class="form-control" placeholder="telepules"><br />
        <button  class="btn btn-primary">Submit</button>
        <a href="."><button class="btn btn-danger">Main page</button></a>
    </div>
</form>
