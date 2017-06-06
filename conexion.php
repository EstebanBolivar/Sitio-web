
<?php

session_start();
?>  
<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "sitioweb";
$tabla = "usuario";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
    die("La conexion fallo: " . $conexion->connect_error);
}

if (isset($_POST['iniciarsesion'])) {
    $username = $_POST['correo'];
    $password = $_POST['cedula'];
    $administrador = 'Administrador';

    $sql = "SELECT * FROM $tabla WHERE correo = '$username'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($password == $row['cedula']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            if ($row['t_usuario'] == $administrador) {
                
                require 'TablaConsulta.php';
            } else {
                require 'index.php';
            }
        } else {
            echo "Correo o contraseña incorrectas";
            echo "<br><a href='login.php'>Volver a intentarlo</a>";
        }
    }
}
?>  