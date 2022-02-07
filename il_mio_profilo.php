<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:login.php');
    exit;
}
include('template_header.php');
include('dal_questionario.php');

$questionario = select_questionari_svolti($_SESSION['id_utente']);
$punti = trova_punteggio($_SESSION['id_utente']['id_utente'])
?>
<h2><?php echo "Benvenuto " . ($_SESSION["username"]); ?></h2>
<br />

<h3>Punteggio attuale: <?php echo $punti['punti'] ?></h3>

<br />
<form action="logout.php">
    <button type="submit">Esci dal profilo</button>
</form>

<h3>I tuoi questionari</h3>
<table>
    <tr>
        <th>Numero</th>
        <th>Tema</th>
        <th>Punteggio</th>
    </tr>
    <?php
    $n = 1;
    foreach ($questionario as $row) {
        $tema = seleziona_tema($row['id_questionario']);
    ?>
        <tr>
            <td><?= $n ?></td>
            <td><?= $tema[0]['tema'] ?></td>
            <td><?= $row['punteggio'] ?></td>
        </tr>
    <?php
    }
    ?>
</table>

<?php
include('template_footer.php');
?>