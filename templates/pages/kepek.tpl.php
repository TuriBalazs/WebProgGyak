<?php
$kepek = array();
$olvaso = opendir($MAPPA);
while (($fajl = readdir($olvaso)) !== false)
    if (is_file($MAPPA . $fajl)) {
        $vege = strtolower(substr($fajl, strlen($fajl) - 4));
        if (in_array($vege, $TIPUSOK))
            $kepek[$fajl] = filemtime($MAPPA . $fajl);
    }
closedir($olvaso);

if (isset($_POST['kuld'])) {
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $MAPPA . $fileName;

    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

    if (in_array($fileType, $allowTypes)) {
        // Fájl feltöltése a szerverre
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            echo "A fájl (" . $fileName . ") sikeresen feltöltve.";
        } else {
            echo "Hiba történt a fájl feltöltésekor.";
        }
    } else {
        echo "Csak JPG, JPEG, PNG, & GIF fájlok engedélyezettek.";
    }
    header("Location: ./kepek");
}

?>
<div class="align-items-center container w-75">
    <div class="m-2">
        <form action="kepek" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile02" name="image">
                <input type="submit" class="input-group-text" for="inputGroupFile02" name="kuld">
            </div>
        </form>

    </div>
    <div class="row">
        <h1>Galéria</h1>
        <?php
        arsort($kepek);
        foreach ($kepek as $fajl => $datum) {
            ?>
            <div class="col">
                <div class="card mb-3" style="width: 16rem;">
                    <a href=" <?php echo $MAPPA . $fajl ?>">
                        <img src="<?php echo $MAPPA . $fajl ?>" class="card-img-top" style="height: 20rem; width 20rem">
                    </a>
                    <div class="card-body">
                        <p>Név: <?php echo $fajl; ?></p>
                        <p>Dátum: <?php echo date($DATUMFORMA, $datum); ?></p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>