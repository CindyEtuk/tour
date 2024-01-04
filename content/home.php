<?php

session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>
 <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
        <link href="../assests/stylesheet/style.css" rel="stylesheet" type="text/css">
	<link href="../assests/stylesheet/main.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>

<?php
include_once 'functn.php';
$pdo = pdo_connect_mysql();

$stmt = $pdo->prepare('SELECT * FROM excursions ORDER BY excursion_name, img DESC LIMIT 4');
$stmt->execute();
$recently_added_excursions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Home')?>
<div class="featured">
<p>Welcome, <?=$_SESSION['username']?>!</p>
    <h2>Experience Dubai</h2>
    <p>Explore, Relax and HaveFun!</p>
</div>
<div class="recentlyadded content-wrapper">
    <h2>Recently Added Excursions</h2>
    <div class="excursions">
        <?php foreach ($recently_added_excursions as $excursions): ?>
        <a href="excursions.php?page=excursion&excursionID=<?=$excursions['excursionID']?>" class="excursion">
            <img src="../upload/<?=$excursions['img']?>" width="200" height="200" alt="">
            <span class="name"><?=$excursions['excursion_name']?></span>
			
			<span class="name"><?=$excursions['price_per_person']?></span>
			
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>

		
	</body>
</html>
