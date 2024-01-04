<?php
include_once 'functn.php';
$pdo = pdo_connect_mysql();
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['excursionID'])) {
    // Prepare statement and execute, prevents SQL injection

    $stmt = $pdo->prepare('SELECT * FROM excursions WHERE excursionID = ?');
    $stmt->execute([$_GET['excursionID']]);
     // Fetch the exc$excursions from the database and return the result as an Array
    $excursions = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the exc$excursions exists (array is not empty)
    if (!$excursions) {
        // Simple error to display if the id for the exc$excursions doesn't exists (array is empty)
        exit(' does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit(' does not exist!');
}
?>


<?=template_footer()?>

<?=template_header('excursions')?>

<div class="excursion content-wrapper">
<img src="../upload/<?=$excursions['img']?>"background-size= "cover" width="100%" height="400px" alt="<?=$excursions['img']?>">
    <div>
        <h1 class="name"><?=$excursions['excursion_name']?></h1>
        <h3><?=$excursions['category']?> </h3>
        <span class="price"> Price: $<?=$excursions['price_per_person']?></span>
        <span class="name"><?=$excursions['description']?></span>
        <span class="name"> Location: <?=$excursions['location']?></span><br><br>
        <a href="booking.html" class="submit"><button>Proceed to Booking </button>
        
        
    </div>
    

</div>

<?=template_footer()?>