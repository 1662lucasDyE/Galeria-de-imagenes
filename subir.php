<?php 
include('conexion.php');

if(isset($_POST['Guardar'])){
    // Creamos una variable para obtener el valor de la imagen
    $imagen = $_FILES['imagen']['name'];
    $nombre = $_POST['titulo'];

    if(isset($imagen) && $imagen != ""){
        $tipo = $_FILES['imagen']['type'];
        $temp = $_FILES['imagen']['tmp_name'];

        // Validamos el tipo de archivo
        if( !(strpos($tipo,'gif') || strpos($tipo,'jpeg') || strpos($tipo,'webp')) ){
            $_SESSION['mensaje'] = 'Solo se permiten archivos JPEG, GIF, o WEBP';
            header('location:../index.php');
            exit();
        } else {
            // Verificamos que el archivo se haya subido correctamente
            if(is_uploaded_file($temp)){
                // Preparamos la consulta para evitar inyecciones SQL
                $query = $conn->prepare("INSERT INTO imagenes (imagen, nombre) VALUES (?, ?)");
                $query->bind_param("ss", $imagen, $nombre);

                if($query->execute()){
                    // Movemos el archivo a la carpeta deseada
                    if(move_uploaded_file($temp, 'imagenes/' . $imagen)){
                        $_SESSION['mensaje'] = 'Se ha subido correctamente';
                    } else {
                        $_SESSION['mensaje'] = 'Error al mover el archivo';
                    }
                } else {
                    $_SESSION['mensaje'] = 'Ocurrió un error en el servidor';
                }
                header('location:../index.php'); // Redirige a index.php
                exit();
            } else {
                $_SESSION['mensaje'] = 'No se ha subido ningún archivo válido';
                header('location:../index.php');
                exit();
            }
        }
    } else {
        $_SESSION['mensaje'] = 'Por favor, selecciona una imagen';
        header('location:../index.php');
        exit();
    }
}
?>
