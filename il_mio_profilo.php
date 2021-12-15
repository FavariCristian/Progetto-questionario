<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:login.php');
    exit;
}
include('template_header.php');
include('dal_questionario.php');
?>

<?php
print_r($_SESSION["username"]);
?>

<form action="logout.php">
    <button type="submit">Esci</button>
</form>

<?php
include('template_footer.php');
?>