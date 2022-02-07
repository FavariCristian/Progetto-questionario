<?php
session_start();

include('template_header.php');
include('dal_questionario.php');

if (isset($_POST["username"])) {
    $_SESSION["username"] = $_POST["username"];
    registra_utente();
    header('Location:il_mio_profilo.php');
}
$id_questionario = $_POST['id_questionario'];
$domande = trova_domande($id_questionario);
?>

<?php
function segna_risposte($domande)
{
    $lista_risposte = [];
    foreach ($domande as $d)
        array_push($lista_risposte, $_POST[$d['id_domanda']]);
    //var_dump($lista_risposte);
    return ($lista_risposte);
}
function confronta_risposte($lista_risposte, $id_questionario)
{
    $punteggio = 0;
    $lista_risposte_corrette = trova_risposte_corrette($id_questionario);
    //var_dump($lista_risposte_corrette);
    for ($i = 0; $i < count($lista_risposte); $i++)
        if ($lista_risposte[$i] == $lista_risposte_corrette[$i]['id_risposta'])
            $punteggio++;
    return $punteggio;
}

$lista_risposte = segna_risposte($domande);
$punteggio = confronta_risposte($lista_risposte, $id_questionario);
registra_questionario($punteggio, $_SESSION['id_utente'][0]['id_utente'], $id_questionario);

//var_dump($_SESSION['id_utente'][0]['id_utente']);

$punti = trova_punteggio($_SESSION['id_utente'][0]['id_utente']);
$punti['punti'] += $punteggio; ?>
</br>
<h4><?php echo ('Hai ottenuto ' . $punti['punti'] . ' punti'); ?></h4>
<?php
$punti['punti'] += $punteggio;
aggiorna_punteggio($_SESSION['id_utente'][0]['id_utente'], $punti);
//aggiorna_punteggio($_SESSION['id_utente'][0]['id_utente'], $punteggio);
?>
</br>
<form action="tutti_questionari.php">
    <button type="submit">Torna ai questionari</button>
</form>
<?php
include('template_footer.php');
?>