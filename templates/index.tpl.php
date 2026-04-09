<?php session_start(); ?>
<?php if (file_exists('./logicals/' . $keres['fajl'] . '.php')) {
	include("./logicals/{$keres['fajl']}.php");
} ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Gy-beadandó</title>
	<link rel="icon" type="image/svg+xml" href="/cat3.png" />
	<link rel="stylesheet" href="./styles/bootstrap.css" type="text/css">
	<?php if (file_exists('./styles/' . $keres['fajl'] . '.css')) { ?>
		<link rel="stylesheet" href="./styles/<?= $keres['fajl'] ?>.css" type="text/css"><?php } ?>
</head>

<body class="bg-primary-subtle w-100">
	<header class="p-5 bg-secondary">
		<h1><strong>Web programozás-1 Gyakorlat házi feladat</strong></h1>
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
		<div class="p-2 align-items-center w-100 p-3" id="content">
			<?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
		</div>
	</div>
	<footer class="p-3 bg-secondary-subtle">
		<p>Copyright © Túri Balázs - GJ8N08 | Kocsis Ágnes Virág - XNNBSI</p>
	</footer>
</body>

</html>