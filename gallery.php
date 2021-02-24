<?php
require_once 'header.php';
include_once 'includes/Photo.php';
include_once 'includes/Database.php';
$db = new Database();
$connection = $db->getConnection();
$photo = new Photo($connection);
?>
<section class="gallery">
    <?php
    $photos = $photo->getImagesFromDatabase();
    foreach ($photos as $element){
        echo '<a data-fancybox="gallery" href="images/gallery/' . $element["filename"] . '">',
            '<img src="images/gallery/' . $element["filename"] . '">',
        '</a>';
    }
    ?>
</section>
<?php
require_once "footer.php";
?>

