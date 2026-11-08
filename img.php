<?php
session_start();
$link = mysqli_connect('localhost', 'root', '', 'newton_go');
if (!isset($_SESSION['usuario'])) {
    die("No has iniciado sesión");
}
$usuario = $_SESSION['usuario'];
$carpeta = "uploads/";
$extension = pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
$nombreArchivo = $usuario . "_" . time() . "." . $extension;
$ruta = $carpeta . $nombreArchivo;
if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta)) {
    $sql = "INSERT INTO imagenes (usuario, ruta) VALUES ('$usuario', '$ruta')";
    if (mysqli_query($link, $sql)) {
        echo "<script> 
        alert('Imagen subida correctamente');
        window.location.href='newton go.php';
    </script>";
    } else {
        echo "<script> 
        alert('Error al guardar en la base de dato');
        window.location.href='newton go.php';
    </script>";
    }
} else {
    echo "Error al subir imagen";
}
?>