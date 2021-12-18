<?php
function db_connect()
{
    set_time_limit(100);
    $mysqli = new mysqli("localhost", "questionari", "password.123", "questionari");
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

function trova_id_utente(){
    $mysqli = db_connect();
    $sql = "SELECT `id_utente` FROM `utente` WHERE nome = '$_SESSION[username]'";
    $result = $mysqli->query($sql);
    $risposte = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    $mysqli->close();
    return $risposte;
}

function trova_domande($id_questionario)
{
    $mysqli = db_connect();
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
    $sql = "INSERT INTO `questionario_svolto` (`id_questionario_svolto`, `punteggio`, `id_utente`, `id_questionario`) VALUES (NULL, '$punteggio', '$id_utente', '$id_questionario')";
    $result = $mysqli->query($sql);
    $result = $mysqli->close();
}
