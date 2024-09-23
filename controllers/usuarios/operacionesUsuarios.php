<?php
//  Conexion
include("../../includes/db.php");
require_once("../session/validacionSession.php");
$operacion = $_GET["operacion"];

if ($operacion == "nuevo") {
    //  Variables
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $id_rol = $_POST["id_rol"];

    //  Consulta
    $query = $conn->prepare("INSERT INTO usuarios (nombre, apellido, email, password, id_rol) VALUES (?, ?, ? ,?, ?)");
    $query->bind_param("ssssi", $nombre, $apellido, $email, $password, $id_rol);
    $query->execute();

} else if ($operacion == "editar") {
    //  Variables
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $id_rol = $_POST["id_rol"];

    //  Consulta
    $query = $conn->prepare("UPDATE usuarios SET nombre = ?, apellido = ?, email = ?, password = ?, id_rol = ? WHERE id = ?");
    $query->bind_param("ssssii", $nombre, $apellido, $email, $password, $id_rol, $id);
    $query->execute();

} else if ($operacion == "eliminar") {
    //  Variable
    $id = $_GET["id"];
    
    //  Consulta
    $query = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
}
header("Location:   ../../views/usuarios/listadoUsuarios.php");
exit();
?>