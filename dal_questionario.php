<?php

function db_connect()
{
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

function registrazione()
{
  $mysqli = db_connect();
  $sql = "INSERT INTO `utente` (`id_utente`, `nome`, `punti`) VALUES (NULL, '$_SESSION[username]', '0')";
  $mysqli->query($sql);
  $result = $mysqli->close();
}

function trova_domande($id_questionario){
  $mysqli = db_connect();
  $sql="SELECT * FROM `domanda` WHERE id_questionario LIKE $id_questionario";
  $result = $mysqli->query($sql);
  $domande = $result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $mysqli->close();
  return $domande;
}

function trova_risposte($id_domanda){
  $mysqli = db_connect($id_domanda);
  $sql="SELECT * FROM `risposta` WHERE id_domanda = '$id_domanda'";
  $result = $mysqli->query($sql);
  $risposte = $result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $mysqli->close();
  return $risposte;
}