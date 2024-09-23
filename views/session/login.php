<?php
require_once("../../includes/db.php");
@session_start();

//  Variables
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

if (!empty($email) && !empty($password)) {
    //  Consulta
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $stmt->close();
    
    $usuario = $resultado->fetch_object();
    
    //  Condicion
    if ($usuario === null) {
        $error = "E-mail o contraseña incorrecto/s";
    } else {
        $_SESSION["id"] = $usuario->id;
        $_SESSION["nombre"] = $usuario->nombre;
        $_SESSION["id_rol"] = $usuario->id_rol;

        header("Location:   ../usuarios/listadoUsuarios.php");
        exit();
    }
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
<body>
<?php include("../../includes/navbar.php") ?>
    <div class="menu">
        <form class="form-login" method="post">
            <h1><span class="det-blue">¡</span>Bienvenido<span class="det-blue">!</span></h1>
            <input type="email" class="input-login" name="email" placeholder="Ingrese su e-mail.">

            <input type="password" class="input-login" name="password" placeholder="Ingrese su contraseña">

            <input type="submit" class="input-login" value="Iniciar sesión">
            <div class="logo">
                <img src="../../styles/images/logo.png" alt="logo" width="120">
            </div>
            <div class="errorMessage">
                <?php if (isset($error)) { echo $error; } ?>
            </div>
        </form>
    </div>
</body>
</html>