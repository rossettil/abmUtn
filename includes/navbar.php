<?php @session_start(); ?>
    <nav>
        <ul>
                <li><a href="../inicio/index.php" class="nav-link">Inicio</a></li>

                <?php if (isset($_SESSION["id"])) { ?>
                <li><a href="../usuarios/listadoUsuarios.php" class="nav-link">Listado</a></li>
                <?php } ?>

                <li><a href="../contacto/contacto.php" class="nav-link">Contacto</a></li>

                <?php if (!isset($_SESSION["id"])) { ?>
                <li><a href="../session/login.php" class="nav-link">Iniciar sesión</a></li>
                <?php } ?>
                
                <?php if (isset($_SESSION["id"])) {
                    if (($_SESSION["id_rol"]==1)) { ?>
                    <li><a href="../usuarios/formularioUsuarios.php" class="nav-link">Agregar usuario</a></li>
                    <?php } ?>
                <li><a href="../../controllers/session/operacionLogOut.php" class="nav-link">Cerrar sesión</a></li>
                <?php } ?>
        </ul>
    </nav>