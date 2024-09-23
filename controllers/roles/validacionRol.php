<?php
@session_start();

if (!isset($_SESSION["id_rol"]) || $_SESSION["id_rol"] !== 1) {
    header("Location:   ../../views/usuarios/listadoUsuarios.php");
    exit();
}
?>