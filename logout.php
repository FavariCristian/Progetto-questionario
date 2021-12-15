<?php
session_start();

include('template_header.php');
include('dal_questionario.php');

session_unset();
header('Location:home_page.php');

include('template_footer.php');
?>