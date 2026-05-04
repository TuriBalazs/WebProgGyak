<?php
$host = "localhost";
$db = "webprog";
$user = "webprog";
$pass = "GJ8n08_xnnbsi";
try {
    $pdo = new PDO( "mysql:host=$host;dbname=$db;charset=UTF8", $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
} catch (PDOException $e) {
    die("Database connection failed");
}
$stmt = $pdo->prepare('SELECT * FROM uzenetek');
$stmt->execute();
?>
<div class="align-items-center container w-75">
    <div class="row">
        <h1>Üzenetek</h1>
        <?php
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="col">
                <div class="card mb-3" style="width: 22rem;">
                    <div class="card-body">
                        <p><?php echo $data['nev']; ?></p>
                        <p><?php echo $data['uzenet']; ?></p>
                        <p><?php echo $data['ido']; ?></p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

</div>