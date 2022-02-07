<?php
session_start();

include('template_header.php');
include('dal_questionario.php');

session_unset();
header('Location:index.php');

include('template_footer.php');
?>