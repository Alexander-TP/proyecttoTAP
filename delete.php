<?php

include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM datos WHERE id = $id";
    $result = mysqli_query($conn, $query);
    
    $_SESSION['message'] = 'Dato eliminado';
    $_SESSION['message_type'] = 'danger';

    header("Location: index.php");
}
?>