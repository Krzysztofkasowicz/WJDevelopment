<?php
require_once 'header.php';
include_once '../includes/Photo.php';
include_once '../includes/Database.php';
$db = new Database();
$connection = $db->getConnection();
$photo = new Photo($connection);
if (isset($_GET["id"])) {
    $photo->removeImageFromDatabase();
    header("Location: delete-photo.php");
    exit();
}
?>
    <div class="container">
        <?php if (isset($_SESSION['successfulDelete']) && $_SESSION['successfulDelete'] == true): ?>
            <div class="alert alert-success" role="alert">
                <span>Zdjęcie zostało usunięte!</span>
            </div>
            <?php unset($_SESSION['successfulDelete']); ?>
        <?php endif; ?>
    <div class="table-responsive-sm">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Ikona</th>
                <th scope="col">Usuń</th>
            </tr>
            </thead>
            <tbody>
            <!--        --><?php
            $photos = $photo->getImagesFromDatabase();
            foreach ($photos as $element) {
                echo '<tr>',
                    '<th scope="row">' . $element["id"] . '</th>',
                    '<td>' . $element["filename"] . '</td>',
                '<td class="icon">',
                    '<img src="../images/gallery/' . $element["filename"] . '">',
                '</td>',
                    '<td><a href="?id=' . $element["id"] . '"><i class="fas fa-trash"></i></a></td>',
                '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
    </div>
<?php
require_once 'footer.php';