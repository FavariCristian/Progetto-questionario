<?php
include('template_header.php');
include('dal_questionario.php');
$questionario = select_all_questionari();
?>

<table>
    <tr>
        <th>Tema</th>
        <th>ID</th>
    </tr>
    <?php
    foreach($questionario as $row){
    ?>
    <tr>
        <td><?=$row['tema']?></td>
        <td><?=$row['id_questionario']?></td>
        <td><a href="questionario.php?id_questionario=<?=$row['id_questionario']?>">Svolgi</a></td>
    </tr>
    <?php
    }
    ?>
</table>

<?php
include('template_footer.php');
?>