<?php session_start(); ?>
<?php if (file_exists('./logicals/' . $keres['fajl'] . '.php')) {
	include("./logicals/{$keres['fajl']}.php");
} ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title><?= $ablakcim['cim'] . ( (isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '' ) ?></title>
	<link rel="shortcut icon" href="cat3.png" type="image/x-icon">
	<link rel="icon" type="image/svg+xml" href="cat3.png" />
	<link rel="stylesheet" href="./styles/bootstrap.css" type="text/css">
	<?php if (file_exists('./styles/' . $keres['fajl'] . '.css')) { ?>
	<link rel="stylesheet" href="./styles/<?= $keres['fajl'] ?>.css" type="text/css"><?php } ?>
</head>

<body class="bg-primary-subtle w-100">
	<header class="p-5 bg-secondary">
		<h1><?= $fejlec['cim'] ?></h1>
		<?php if (isset($fejlec['motto'])) { ?><h2><?= $fejlec['motto'] ?></h2><?php } ?>
		<?php if(isset($_SESSION['login'])) { ?>Bejlentkezve: <strong><?= $_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].")" ?></strong><?php } ?>
	</header>

	<div>
		<nav class="navbar navbar-expand-lg bg-secondary-subtle p-2 justify-content-center">
			<div class="container-fluid justify-content-center">
				<div class="justify-content-center" id="navbarSupportedContent">
					<ul class="navbar-nav justify-content-center">
						<?php foreach ($oldalak as $url => $oldal) { ?>
							<?php if (!isset($_SESSION['login']) && $oldal['menun'][0] || isset($_SESSION['login']) && $oldal['menun'][1]) { ?>
								<li class="nav-item" <?= (($oldal == $keres) ? ' class="active"' : '') ?>>
									<a class="nav-link" href="<?= ($url == '/') ? '.' : $url ?>">
										<?= $oldal['szoveg'] ?></a>
								</li>
							<?php } ?>
						<?php } ?>

					</ul>
				</div>
			</div>
		</nav>
		<div class="p-3 w-100" id="content">
			<?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
		</div>
	</div>
	<footer class="p-3 bg-secondary-subtle text-center">
		<?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?> <?php } ?>
		&nbsp;
        <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>
	</footer>
</body>

</html>