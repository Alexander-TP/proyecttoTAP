<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>



<body class="bg-secondary">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Proyecto</a>
        </div>
    </nav>
    <div class="container p-4">
        <div class="row">
            <div class="col-sm-4">

                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php session_unset();
                } ?>


                <div class="card card-body">
                    <h3 class="text-center">Nuevo Ingreso</h3>
                    <form action="save.php" method="POST">
                        <div class="form-group">
                            <input type="text" autocomplete="off" name="nombre" class="form-control border-secondary mt-3 mb-4" placeholder="Ingresa el nombre">
                        </div>
                        <div class="form-group">

                            <textarea name="descripcion" rows="3" class="form-control mb-3 border-secondary" 
                            placeholder="Descripcion"></textarea>

                            <div class="d-grid gap-2">
                                <input type="submit" name="save" value="Guardar" class="btn btn-success btn-block">
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <h3 class="text-center text-light">Registros actuales</h3>
            <table class="table table-bordered border-primary table-light">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM datos";
                    $resultado = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($resultado)) { ?>

                        <tr>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['descripcion'] ?></td>
                            <td><?php echo $row['fecha_cr'] ?></td>
                            <td><a class="btn btn-primary" href="edit.php?id=<?php echo $row['id']; ?>"><i class="bi bi-pencil-square"></i></a>
                                <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>"><i class="bi bi-trash-fill"></i></a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
    <?php include("includes/footer.php"); ?>