<?php include('db.php')?>
<?php include('include/header.php')?>
<?php include ('include/footer.php')?>

<div class="container p-4">

<div class="col-md-4">
    <div class="card card-body">

        <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION ['message'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
           <?php session_unset(); } ?>
        <form action="save_task.php" method = "POST">
            <div class="form-group">
                <input type="text" name = "title" class = "form-control" 
                placeholder = "Ecribir una tarea" autofocus require >
            </div>
            <div class="form-group">
                <textarea name="description" rows="3" class = "form-control"
                 placeholder = "Descripción de la tarea" require></textarea>
            </div>
            <input type="submit" value="GUARDAR" class = "btn btn-success btn-block"
            name = "save_task">
        </form>
    </div>
</div>

    <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Fecha creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $query = "SELECT * FROM task";
                      $result = mysqli_query($conn, $query);
                      
                      while($row = mysqli_fetch_array($result)) {?>
                        <tr>
                            <td><?php echo $row['titulo'] ?></td>
                            <td><?php echo $row['descripcion'] ?></td>
                            <td><?php echo $row['fecha_creado'] ?></td>
                            <td>
                                <a href="edit.php?id= <?php echo $row['id'] ?>
                                " class = "btn btn-secondary"> 
                                    <i class = "fas fa-marker"></i>
                                </a>
                                <a href="edit.php?id= <?php echo $row['id'] ?>
                                "class = "btn btn-danger">            
                                    <i class = "far fa-trash alt"></i>
                                </a>
                            </td>
                        </tr>
                      
                    <?php }?>
            </tbody>
        </table>


    </div>

</div>