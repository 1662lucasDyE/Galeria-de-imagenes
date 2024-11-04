<?php
$conn = mysqli_connect('localhost','root','','galeria');
if($conn){
    echo '';
    
}
?>

<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'galeria';

$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
?>