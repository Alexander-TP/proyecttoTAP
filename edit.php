<?php

include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM datos WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $descripcion = $row['descripcion'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $query = "UPDATE datos SET nombre = '$nombre', descripcion = '$descripcion'
              WHERE id = $id";
    mysqli_query($conn, $query);


    $_SESSION['message'] = 'Dato actualizado';
    $_SESSION['message_type'] = 'warning';
    header("Location: index.php");
}
?>


<?php include("includes/header.php"); ?>

<body class="bg-secondary">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Navbar</a>
        </div>
    </nav>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">

                <div class="card card-body">
                    <h3 class="text-center">Editar resgistro</h3>
                    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                            <input type="text" autocomplete="off" name="nombre" value="<?php echo $nombre; ?>" class="form-control border-secondary mt-3 mb-3" placeholder="Ingresa el nombre">
                        </div>
                        <div class="form-group">
                            <textarea name="descripcion" rows="3" class="form-control mb-3 border-secondary text-left" placeholder="Descripcion">

                            <?php echo $descripcion; ?>
                            </textarea>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-success btn-block" name="update">
                                Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <?php include("includes/footer.php"); ?>