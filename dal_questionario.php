<?php

function db_connect()
{
  $mysqli = new mysqli("localhost", "Questionari", "password.123", "questionari");
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