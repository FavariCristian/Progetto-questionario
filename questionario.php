<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location:login.php');
  exit;
}
include('template_header.php');
include('dal_questionario.php');

$id_questionario = $_GET['id_questionario'];
$domande = trova_domande($id_questionario);
?>

<form action="risultato.php" method="post" id="quiz">
  <?php
  $n = 1;
  foreach ($domande as $d) {
    $risposte = trova_risposte($d['id_domanda']);
  ?>
    <ol start=<?php $n ?>>
      <li>
        <tr>
          <?= $d['contenuto'] ?></td>
          <?php foreach ($risposte as $r) { ?>
            <div>
              <input type="radio" id=<?= $r['id_risposta'] ?> name="risposta" value=<?= $r['contenuto'] ?> checked>
              <label for="<?= $r['id_risposta'] ?>"><?= $r['contenuto'] ?></label></td>
            </div>
          <?php
          }
          $n++;
          ?>
        <tr>
      </li>
    </ol>
  <?php } ?>
  <input type="submit" value="Termina" class="submitbtn" />
</form>

<?php
include('template_footer.php');
?>