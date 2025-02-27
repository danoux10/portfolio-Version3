<?php
$host = 'localhost';
$dbname = 'portfolio';
$username = 'root';//change for nas
$password = '';//change for nas

try {
  $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", "$username", "$password");
} catch (exception $e) {
  die('Erreur : ' . $e->getMessage());
}