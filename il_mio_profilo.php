<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:login.php');
    exit;
}
include('template_header.php');
include('dal_questionario.php');

$questionario = select_all_questionari_svolti();
?>

<h2><?php echo "Benvenuto " . ($_SESSION["username"]); ?></h2>

<form action="logout.php">
    <button type="submit">Esci dal profilo</button>
</form>

<h3>I tuoi questionari</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Tema</th>
        <th>Punteggio</th>
    </tr>
    <?php
    foreach ($questionario as $row) {
        $tema = seleziona_tema($row['id_questionario']);
    ?>
        <tr>
            <td><?= $row['id_questionario_svolto'] ?></td>
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