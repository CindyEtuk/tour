<?php
include_once 'functn.php';
$pdo = pdo_connect_mysql();
// The amounts of excursions to show on each page
$num_excursions_on_each_page = 12;
// The current page, in the URL this will appear as index.php?page=excursions&p=1, index.php?page=excursions&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
// Select excursions ordered by the date added
$stmt = $pdo->prepare('SELECT * FROM excursions ORDER BY category DESC LIMIT ?,?');
// bindValue will allow us to use integer in the SQL statement, we need to use for LIMIT
$stmt->bindValue(1, ($current_page - 1) * $num_excursions_on_each_page, PDO::PARAM_INT);
$stmt->bindValue(2, $num_excursions_on_each_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the excursions from the database and return the result as an Array
$excursions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of excursions
$total_excursions = $pdo->query('SELECT * FROM excursions ')->rowCount();
?>

<?=template_header('excursions')?>

<div class="excursions content-wrapper">
    <h1>EXCURSION EVENTS</h1>
    <p><?=$total_excursions?> Avaliable Excursions</p>
    <div class="excursions-wrapper">
        <?php foreach ($excursions as $excursion): ?>
         <a href="excursion.php?excursionID=<?=$excursion['excursionID']?>" class="excursion">
            <img src="../upload/<?=$excursion['img']?>"background-size= "cover" width="250px" height="250px" alt="<?=$excursion['excursion_name']?>">
            <span class="name"><?=$excursion['excursion_name']?></span>
            <span class="name">Category: <?=$excursion['category']?></span>
            <span class="name"> view more</span>
            
        </a>
        <?php endforeach; ?>
        
    </div>
</div>

<?=template_footer()?>