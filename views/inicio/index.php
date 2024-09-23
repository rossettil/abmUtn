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
                Lorem ipsum dolor sit amet consectetur adipisicing elit<span class="det-blue">.</span> Expedita tenetur aspernatur consequatur perferendis soluta animi distinctio temporibus quam laboriosam et<span class="det-blue">?</span> Quam<span class="det-blue">,</span> eaque corrupti<span class="det-blue">.</span> Sequi alias neque cupiditate id maxime doloribus<span class="det-blue">?</span>
            </p>
            <p>
                Lorem ipsum dolor sit amet<span class="det-blue">,</span> consectetur adipisicing elit<span class="det-blue">.</span> Saepe ratione<span class="det-blue">,</span> iure fugit quisquam reiciendis cupiditate perferendis a fuga magnam commodi illum<span class="det-blue">?</span> Maxime porro quo obcaecati molestias dolores consectetur asperiores nobis<span class="det-blue">.</span>
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
</div>
</body>
</html>