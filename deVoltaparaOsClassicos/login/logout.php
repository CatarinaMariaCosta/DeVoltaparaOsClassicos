<?php 
//Verifica sessão e/ou cria uma nova.
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
//Limpa a sessão e destroi
$_SESSION = array();
session_destroy();
//redireciona para index.php
header("Location: /deVoltaparaOsClassicos/index.php");
exit();
?>