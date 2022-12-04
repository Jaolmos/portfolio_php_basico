<?php include("header.php"); ?>
<?php include("conexion.php"); ?>
<?php

if ($_POST) {


    $name = $_POST['name'];
    $descripcion = $_POST['descripcion'];

    $fecha = new DateTime();
    
    $imagen = $fecha->getTimestamp()."_".$_FILES['image']['name'];
    $imagen_temporal = $_FILES['image']['tmp_name'];
    move_uploaded_file($imagen_temporal, "img/".$imagen);

    $objConexion = new conexion();

    $sql = "INSERT INTO `portfolio` (`id`, `nombre`, `imagen`, `descripcion`) 
        VALUES (NULL, '$name', '$imagen', 
        '$descripcion');";

    $objConexion->ejecutar($sql);
}
if($_GET) {
    
    $id = $_GET['borrar'];
    $objConexion = new conexion();
    //borrado del archivo
    $imagen = $objConexion->consultar(("SELECT imagen FROM `portfolio` WHERE id=".$id)); 
    unlink("img/".$imagen[0]['imagen']); //se realiza el borrado de una imagen
    //borrado del archivo en la base de datos
    $sql="DELETE FROM `portfolio` WHERE `portfolio`.`id` =".$id;
    $objConexion->ejecutar($sql);

}

$objConexion = new conexion();
$proyectos = $objConexion->consultar(("SELECT * FROM `portfolio`"));



?>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">
                    Datos del proyecto
                </div>
                <div class="card-body">
                    <form action="portfolio.php" method="POST" enctype="multipart/form-data">

                        Nombre del proyecto: <input type="text" name="name" class="form-control">
                        <br>
                        Imagen del proyecto: <input type="file" name="image" id="">
                        <br>

                        Descripción:
                       <textarea class="form-control" name="descripcion" id=""  rows="10"></textarea>

                        <br>
                        <input type="submit" value="Subir el proyecto" class="btn btn-success mt-2">


                    </form>


                </div>
                <div class="card-footer text-muted">

                </div>
            </div>
        </div>
        <div class="col-">
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($proyectos as $proyecto) { ?>
                            <tr class="">
                                <td scope="row"><?php echo $proyecto['id']; ?></td>
                                <td><?php echo $proyecto['nombre']; ?></td>
                                <td>
                                    <img src="img/<?php echo $proyecto['imagen']; ?>" alt="" width="100">
                                </td>
                                <td><?php echo $proyecto['descripcion']; ?></td>
                                <td><a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>" role="button">Eliminar</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>







<?php include("footer.php"); ?>