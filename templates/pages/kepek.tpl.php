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
?>
<div class="align-items-center container w-75">
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