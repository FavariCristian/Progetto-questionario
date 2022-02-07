<?php
include('template_header.php');
include('dal_questionario.php');
$questionario = select_all_questionari();
$id = trova_id_utente();
?>

<table>
    <tr>
        <th>ID</th>
        <th>Tema</th>
        <th></th>
    </tr>
    <?php
    foreach ($questionario as $row) {
    ?>
        <tr>
            <td><?= $row['id_questionario'] ?></td>
            <td><?= $row['tema'] ?></td>
            <td><a href="questionario.php?id_questionario=<?= $row['id_questionario'] ?>">Svolgi</a></td>
        </tr>
    <?php
    }
    ?>
</table>

<?php
include('template_footer.php');
?>