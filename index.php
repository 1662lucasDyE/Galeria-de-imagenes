<?php
    include ('../crud_img/Backend/conexion.php');
    $query = "select * from imagenes";
    $resultado = mysqli_query($conn,$query) ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="colg-lg-4">
                <h1 class="text-primary">subir image</h1>

                <?php
session_start();
if (isset($_SESSION['mensaje'])) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?php echo $_SESSION['mensaje']; ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['mensaje']); // Borra el mensaje después de mostrar la alerta
} 
?>

                <form action="../crud_img/Backend/subir.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="my-input">Seleccione una imagen</label>
                        <input id="my-input" type="file" name="imagen">
                    </div>
                <!-- nombre -->
                <div class="form-group">
                        <label for="my-input">Titulo de la imagen</label>
                        <input id="my-input" class="form-control" type="text" name="titulo">
                    </div>
                     <input type="submit" value="Guardar" name="Guardar">
                </form>

            </div>
            <div class="colg-lg-8">
                <h1 class="text-primary text-center">Galeria de imagenes</h1>
                <hr>
                <div class="card-columns">
                    <?php 
                        foreach($resultado as $row){ ?>
                   
                <div class="card">
                    <img class="card-img-top" src="./Backend/imagenes/<?php echo $row ['imagen']; ?>" alt="...">
                    <div class="card-body">
                    <h5 class="card-title"><strong><?php echo $row ['nombre']?></strong></h5>
                    </div>
                     <?php }?>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>