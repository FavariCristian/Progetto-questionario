<?php
session_start();

include('template_header.php');
include('dal_questionario.php');

if (isset($_POST["username"])) {
    $_SESSION["username"] = $_POST["username"];
    registra_utente();
    $_SESSION["id_utente"] = trova_id_utente();
    header('Location:il_mio_profilo.php');
}
?>
<br>
<form action="login.php" method="post">
    <label>Inserisci il tuo nome: </label>
    <input type="text" id="username" name="username">
    <br />
    <button href="logout.php">Conferma</button>
</form>

<?php
include('template_footer.php');
?>