<?php
    include 'db_connect.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($_POST['nev']!=""){
            $stmt = $pdo->prepare('UPDATE munkaado set nev = :nev, telepules = :telepules where mhelyid = :mhelyid');
            $stmt->execute(array(':nev' => $_POST['nev'],':telepules' => $_POST['telepules'],':mhelyid' => $_GET['mhelyid'],));
        }
        header("Location: ."); // Go to the main folder
    }
    $stmt = $pdo->prepare('SELECT * from munkaado where mhelyid = :mhelyid');
    $stmt->execute(array(':mhelyid' => $_GET["mhelyid"]));
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<form method="POST">
    <div class="col-md-6">
        <input type="text" value="<?php echo $userData['nev']; ?>" name="nev" class="form-control" placeholder="nev"><br />
        <input type="text" value="<?php echo $userData['telepules']; ?>" name="telepules" class="form-control" placeholder="telepules"><br />
        <button class="btn btn-primary">Submit</button>
        <a href="."><button class="btn btn-danger">Main page</button></a>
    </div>
</form>