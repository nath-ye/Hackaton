<?php
session_start();
$link = mysqli_connect('localhost', 'root', '', 'newton_go');
if (!$link) {
    die('No se puede conectar: ' . mysqli_connect_error());
}

if (isset($_POST["registrar"])) {
    $correo = $_POST["correo"];
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    $check = mysqli_query($link, "SELECT * FROM usuarios WHERE usuario='$usuario'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script> 
        alert('El usuario ya existe');
        window.location.href='inicio_sesion.html';
    </script>";
    exit;
    }
    $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarios (contrasena, correo, usuario)
            VALUES ('$contrasenaHash', '$correo', '$usuario')";
    if (!mysqli_query($link, $sql)) {
        echo "<script>
    alert('Error al registrar el usuario');
    window.location.href='inicio_sesion.html';
    </script>";
    exit;
    }
    $_SESSION['usuario'] = $usuario;
    header("Location: newton go.php");
    exit;
}

if (isset($_POST["iniciar"])) {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' LIMIT 1";
    $res = mysqli_query($link, $sql);
    $user = mysqli_fetch_assoc($res);
    if (!$user || !password_verify($contrasena, $user['contrasena'])) {
        echo "<script>
    alert('Login incorrecto');
    window.location.href='inicio_sesion.html';
    </script>";
    exit;
    }
    $_SESSION['usuario'] = $usuario;
    header("Location: newton go.php");
    exit;
}
?>