<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

<?php
// Verificar si se ha enviado el formulario
if (isset($_POST ['user_id'], $_POST ['name'], $_POST ['surname'], $_POST ['password'], $_POST['email'], $_POST['rol'])) {
// Recopilar datos del formulario
$user_id = $_POST['user_id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$password = $_POST['password'];
$email = $_POST['email'];
$rol = $_POST['rol'];
$active = isset($_POST['active']) ? 1 : 0;

echo $user_id . "<br>";
echo $name . "<br>";
echo $surname . "<br>";
echo $password . "<br>";
echo $email . "<br>";
echo $rol . "<br>";
echo $active . "<br>";

//Conexión de BD
    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "users");
    //define("PORT", "3306");
    
//Verificar la conexión    
    $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
// Inserir les dades a la taula "user"
    $sql = "INSERT INTO `user`(`user_id`, `name`, `surname`, `password`, `email`, `rol`, `active`) VALUES ('$user_id', '$name', '$surname', '$password', '$email', '$rol', $active)";

    if (!$conn) {
        echo "Error de conexión a la base de datos.";
    }
    // Ejecutar la consulta
    if (mysqli_query($conn, $sql)) {
        header('Location: mostrar.php');
    } else {
        echo "Error al ejecutar la consulta SQL: " . mysqli_error($conn);
    }
    }

        //mysqli_close($connect);
    ?>  

</body>
</html>