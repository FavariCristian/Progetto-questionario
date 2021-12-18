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

<form action="risultato.php" method="post" id="quiz" type="hidden">
  <?php
  $n = 1;
  foreach ($domande as $d) {
    $risposte = trova_risposte($d['id_domanda']);
  ?>
    <ol start="<?= $n ?>">
      <li>
        <tr>
          <?= $d['contenuto'] ?>
          <?php foreach ($risposte as $r) {
          ?>
            <div>
              <input type="radio" id=<?= $r['id_risposta'] ?> name="<?= $r['id_domanda'] ?>" value=<?= $r['id_risposta'] ?> checked>
              <label for="<?= $r['id_risposta'] ?>"><?= $r['contenuto'] ?></label>
            </div>
          <?php
          }
          $n++;
          ?>
        <tr>
      </li>
    </ol>
  <?php } ?>
  <input type="hidden" name="id_questionario" value="<?= $id_questionario ?>" />
  <input type="submit" value="Termina" class="submitbtn" />
  <input type="hidden" name="<?= $r['id_domanda'] ?>" id="contenuto_domanda" value="<?= $r['id_risposta'] ?>" />
</form>

<form action="risultato.php" method="post">




</form>

<?php
include('template_footer.php');
?>