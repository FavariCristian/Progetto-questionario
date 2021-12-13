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
include('template_footer.php');
?>