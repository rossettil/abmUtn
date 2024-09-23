<?php
include("../../includes/db.php");
include("../../controllers/session/validacionSession.php");
@session_start();

$resultado = $conn->query("SELECT * FROM usuarios;");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<?php include("../../includes/navbar.php");?>
<?php if (isset($_SESSION["id"])) { ?>
    <div class="wel-user">
        <p>Bievenido <span class="det-blue"><?php echo $_SESSION["nombre"];?></span></p>
    </div>
    <?php } ?>
    <table>
        <thead>
            <tr class="cabezal">
                <?php if (isset($_SESSION["id"])) { ?>
                <th>ID</th>
                <?php } ?>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <?php if (isset($_SESSION["id"])) { ?>
                <th>E-MAIL</th>
                    <?php if (($_SESSION["id_rol"]==1)) { ?>
                        <th>PASSWORD</th>
                    <?php } ?>
                <?php } ?>
                <th>ROL</th>
                <?php if (isset($_SESSION["id"])) { ?>
                    <?php if (($_SESSION["id_rol"]==1)) { ?>
                        <th>OPCIONES</th>
                    <?php } ?>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = $resultado->fetch_object()) { ?>
            <tr>
                <?php if (isset($_SESSION["id"])) { ?>
                    <td><?php echo $fila->id ?></td>
                <?php } ?>

                <td><?php echo $fila->nombre ?></td>

                <td><?php echo $fila->apellido ?></td>

                <?php if (isset($_SESSION["id"])) { ?>
                    <td><?php echo $fila->email ?></td>
                <?php } ?>

                <?php if (isset($_SESSION["id"])) {
                    if (($_SESSION["id_rol"]==1)) { ?>
                        <td><?php echo $fila->password ?></td>
                    <?php } ?>

                    <td>
                        <?php
                            if ($fila->id_rol==1) {
                                echo "Adminsitrador";
                            } else if ($fila->id_rol==2) {
                                echo "Empleado";
                            }
                        ?>
                    </td>
                <?php if (isset($_SESSION["id"])) {
                    if (($_SESSION["id_rol"]==1)) { ?>
                    <td class="last-td">
                        <a href="formularioUsuarios.php?id=<?php echo $fila->id?>"><span class="material-symbols-outlined">edit</span></a>
                        <a href="../../controllers/usuarios/operacionesUsuarios.php?operacion=eliminar&id=<?php echo $fila->id?>"><span class="material-symbols-outlined">delete</span></a>
                    </td>
                    <?php } ?>
                <?php } ?>
            </tr>
            <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>