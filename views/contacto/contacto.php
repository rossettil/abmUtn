<?php @session_start() ?>
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
<?php include("../../includes/navbar.php"); ?>
<div class="menu">
    <div class="menu-index">
        <div class="parrafos">
            <p>
                Por el momento la pagina de contacto no esta finalizada<span class="det-blue">,</span> por favor vuelve en otro momento<span class="det-blue">.</span>
            </p>
        </div>
        <?php if (!isset($_SESSION["id"])) { ?>
        <h2>
            <span class="det-blue">¿</span>Aun no iniciaste sesión<span class="det-blue">?</span>
        </h2>
        <div class="div-btn">
            <a href="../session/login.php" class="idx-btn">Haz click aqui</a>
        </div>
        <?php } else { ?>
        <h2>
            <span class="det-blue">¿</span>Quieres ir al listado<span class="det-blue">?</span>
        </h2>
        <div class="div-btn">
            <a href="../usuarios/listadoUsuarios.php" class="idx-btn">Haz click aqui</a>
        </div>
        <?php } ?>
</div>
</body>
</html>