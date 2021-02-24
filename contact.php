<?php
session_start();
require_once 'header.php';
if (isset($_POST['submit'])){
    $email = $_POST['email'];
    $name = $_POST['name'];
    $message = $_POST['message'];

    $headers = "From: " . strip_tags($_POST['email']) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";

    mail('m.drzymala@bigcitybroker.pl', 'Wiadomość z formularza', $message, $headers);

   $_SESSION['emailSent'] = true;
   header('Location: /kontakt');
   exit();
}
?>
<?php if (isset($_SESSION['emailSent']) && $_SESSION['emailSent'] == true): ?>
    <p class="message-sent">Twoja wiadomość została wysłana! Dziękujemy!</p>
    <?php unset($_SESSION['emailSent']); ?>
<?php endif; ?>
<section class="contact">
    <form class="contact-form" method="post" action="contact.php">
        <h3>Napisz do nas!</h3>
        <label for="email">Adres email</label>
        <input type="email" name="email" required>
        <label for="name">Imię i nazwisko</label>
        <input type="text" name="name" required>
        <label for="message">Treść wiadomości</label>
        <textarea name="message" rows="10" required></textarea>
        <button type="submit" name="submit">Wyślij</button>
    </form>
    <div>
        <h3>Dane kontaktowe</h3>
        <p>Telefon: 531 990 187</p>
        <p>Adres email: m.drzymala@bigcitybroker.pl</p>
    </div>
</section>
<?php
require_once "footer.php";
?>

