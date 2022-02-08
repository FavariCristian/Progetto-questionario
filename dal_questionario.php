<?php
session_start();
include('config.php');

function db_connect()
{
    set_time_limit(100);
    $mysqli = new mysqli(SERVER, USER, PASS, DB);
    if ($mysqli->connect_error) {
        die('Connection failed. Error: ' . $mysqli->connect_error);
    }
    return $mysqli;
}

function select_all_questionari()
{
    $mysqli = db_connect();
    $sql = "SELECT * FROM questionario ORDER BY id_questionario";
    $result = $mysqli->query($sql);
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    $mysqli->close();
    return $data;
}

function registra_utente()
{
    $mysqli = db_connect();
    $sql = "INSERT INTO `utente` (`id_utente`, `nome`, `punti`) VALUES (NULL, '$_SESSION[username]', '0')";
    $mysqli->query($sql);
    $result = $mysqli->close();
}

function trova_id_utente()
{
    $mysqli = db_connect();
    $sql = "SELECT `id_utente` FROM `utente` WHERE nome = '$_SESSION[username]'";
    $result = $mysqli->query($sql);
    $risposte = mysqli_fetch_row($result);
    $result->free();
    $mysqli->close();
    return $risposte[0];
}

function trova_domande($id_questionario)
{
    $mysqli = db_connect();
    $id_questionario = intval($id_questionario);
    $sql = "SELECT * FROM `domanda` WHERE id_questionario LIKE $id_questionario";
    $result = $mysqli->query($sql);
    $domande = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    $mysqli->close();
    return $domande;
}

function trova_risposte($id_domanda)
{
    $mysqli = db_connect();
    $id_domanda = intval($id_domanda);
    $sql = "SELECT * FROM `risposta` WHERE id_domanda = '$id_domanda'";
    $result = $mysqli->query($sql);
    $risposte = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    $mysqli->close();
    return $risposte;
}

function trova_risposte_corrette($id_questionario)
{
    $mysqli = db_connect();
    $id_questionario = intval($id_questionario);
    $sql = "SELECT r.id_risposta FROM `risposta` as r INNER JOIN domanda as d ON r.id_domanda = d.id_domanda INNER JOIN questionario as q ON d.id_questionario = q.id_questionario WHERE q.id_questionario=$id_questionario AND vero_falso = '1'";
    $result = $mysqli->query($sql);
    $risposte = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    $mysqli->close();
    return $risposte;
}

function registra_questionario($punteggio, $id_utente, $id_questionario)
{
    $mysqli = db_connect();
    $punteggio = intval($punteggio);
    $id_utente = intval($id_utente);
    $id_questionario = intval($id_questionario);
    $sql = "INSERT INTO `questionario_svolto` (`id_questionario_svolto`, `punteggio`, `id_utente`, `id_questionario`) 
        VALUES (NULL, '$punteggio', '$id_utente', '$id_questionario')";
    $mysqli->query($sql);
    $mysqli->close();
}

function trova_punteggio($id_utente)
{
    $mysqli = db_connect();
    $id_utente = intval($id_utente);
    $sql = "SELECT punti FROM utente WHERE id_utente = '$id_utente'";
    $result = $mysqli->query($sql);
    $punti = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    $mysqli->close();
    return $punti;
}

function aggiorna_punteggio($id_utente, $punti_totali)
{
    $mysqli = db_connect();
    $id_utente = intval($id_utente);
    $punti_totali = intval($punti_totali);
    $sql = "UPDATE `utente` SET `punti`= $punti_totali WHERE id_utente='$id_utente'";
    $mysqli->query($sql);
    $mysqli->close();
}

function seleziona_tema($id_questionario)
{
    $mysqli = db_connect();
    $id_questionario = intval($id_questionario);
    $sql = "SELECT q.tema FROM questionario as q INNER JOIN questionario_svolto as s ON q.id_questionario = s.id_questionario WHERE s.id_questionario = $id_questionario";
    $result = $mysqli->query($sql);
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    $mysqli->close();
    return $data;
}

function select_questionari_svolti($id_utente)
{
    $mysqli = db_connect();
    $id_utente = intval($id_utente);
    $sql = "SELECT * FROM questionario_svolto WHERE id_utente = '$id_utente' ORDER BY id_questionario_svolto";
    $result = $mysqli->query($sql);
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    $mysqli->close();
    return $data;
}
