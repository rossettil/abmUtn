<?php
include("../../includes/db.php");
include("../../controllers/session/validacionSession.php");
include("../../controllers/roles/validacionRol.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $resultado = $query->get_result();
    $usuario = $resultado->fetch_object();
} else {

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../styles/style.css">
</head>
<body class="scroll-over">
<?php include("../../includes/navbar.php");?>
    <form class="form-user" action="../../controllers/usuarios/operacionesUsuarios.php?operacion=<?php echo (isset($_GET["id"])) ? "editar" : "nuevo" ?>" method="POST">
        <?php if (isset($_GET["id"])) { ?>
        <h1>Editar usuario</h1>
        <?php } else { ?>
        <h1>Nuevo usuario</h1>
        <?php } ?>
        <?php if (isset($_GET["id"])) { ?>
        <label>ID</label>
        <input type="number" name="id" value="<?php echo $usuario->id?>" readonly><br>
        <?php } ?>

        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo (isset($_GET["id"])) ? $usuario->nombre : "" ?>"><br>

        <label>Apellido</label>
        <input type="text" name="apellido" value="<?php echo (isset($_GET["id"])) ? $usuario->apellido : "" ?>"><br>

        <label>E-mail</label>
        <input type="email" name="email" value="<?php echo (isset($_GET["id"])) ? $usuario->email : "" ?>"><br>

        <label>Contraseña</label>
        <input type="text" name="password" value="<?php echo (isset($_GET["id"])) ? $usuario->password : "" ?>"><br>

        <label>Rol:</label>
        <select name="id_rol" id="id_rol">
            <?php
            if ($usuario->id_rol=="1") { ?>
                <option value="1">Administrador</option>
                <option value="2">Empleado</option>
            <?php } else { ?>
                <option value="2">Empleado</option>
                <option value="1">Adminsitrador</option>
            <?php } ?>
        </select>
        <br><br>
        <?php if (isset($_GET["id"])) { ?>
        <input type="submit" value="Editar">
        <?php } else { ?>
        <input type="submit" value="Añadir">
        <?php } ?>
    </form>
</body>
</html>