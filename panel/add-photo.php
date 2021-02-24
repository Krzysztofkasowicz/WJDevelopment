<?php
require_once 'header.php';
include_once '../includes/Photo.php';
include_once '../includes/Database.php';
if (isset($_POST['submit'])) {
    $db = new Database();
    $connection = $db->getConnection();
    $photo = new Photo($connection);
    $photo->setFile($_FILES['file']['tmp_name']);
    $photo->setFileName($_FILES['file']['name']);
    if ($photo->hasCorrectFileExtension() && $photo->hasCorrectSize() && $photo->hasBeenAdded()){
        $photo->uploadPhoto();
        $photo->insertImagePathToDatabase();
    }
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}
?>
<div class="container">
    <?php if (isset($_SESSION['success']) && $_SESSION['success'] == true): ?>
            <div class="alert alert-success" role="alert">
            <span>Zdjęcie zostało wysłane!</span>
            </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['errors'])): ?>
        <div class="alert alert-danger" role="alert">
            <span>Operacja zakończona niepowodzeniem.</span>
            <span><?php echo $_SESSION["errors"] ?></span>
        </div>
        <?php unset($_SESSION['errors']); ?>
    <?php endif; ?>
    <form method="POST" action="add-photo.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="form-control-file">Dodawanie zdjęcia</label>
            <input type="file" name="file" class="form-control-file" id="form-control-file" required>
        </div>
        <button class="btn btn-lg btn-primary" name="submit" type="submit">Dodaj zdjęcie</button>
    </form>
</div>
<?php
require_once 'footer.php';
