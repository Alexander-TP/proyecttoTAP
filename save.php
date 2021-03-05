<?php

include("db.php");

if (isset($_POST['save'])){
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $query = "INSERT INTO datos(nombre, descripcion)
              VALUES('$nombre', '$descripcion')";

    mysqli_query($conn, $query);


    $_SESSION['message'] = 'Dato guardado';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}


?>