<?php
session_start();
session_unset(); // Remove variáveis da sessão
session_destroy(); // Destrói sessão ativa
header("Location: login.php"); // Redireciona
exit();
?>