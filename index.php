<?php
//Se inicia sesion 
session_start();

include "bdConf.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pàgina d'inici</title>
</head>
<body>

<?php
//Si no hay sesion te redirige a la pagina del login
    if($_SESSION['LoggedIn']==false){
        header('Location:login.html');
    }

try{
    $conn= mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
 //Se muestra la informacion del usuario que ha hecho sesion   
    if($conn){  
        if (isset($_COOKIE["lang"])) {
            if ($_COOKIE["lang"] == "cat") {
                 //Si es el rol profesor se pone una tabla con todos los profes y su informacion(su nombre, apellido y email)
                if ($_SESSION["rol"] == "professorat") { 
                    echo "<h1>Hola " . $_SESSION["name"] . ", ets un " . $_SESSION["rol"] . "</h2>";
                    //Se pone los enlaces 
                    echo '<a style="color: red" href="idioma.php?lang=cat">Cat</a>';
                    echo ' ';
                    echo '<a href="idioma.php?lang=es">Es</a>';
                    echo ' ';
                    echo '<a href="idioma.php?lang=en">En</a>';
                    echo ' ';
                    echo '<a href="delete.php">Eliminar</a><br><br>';

                    echo '<a href="mostrarinfo.php?user_id=' . $_SESSION['user_id'] . '">Mostra informació</a>';
                    echo ' ';
                    echo '<a href="destruir.php">Desconnectar</a><br><br>';  
                    $queryquery = "SELECT * FROM `user` WHERE `rol` = 'professorat'";
                    $result = mysqli_query($conn, $queryquery);
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table>";
                        echo "<tr><th>Nom</th><th>Cognom</th><th>Email</th></tr>";
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["surname"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                } else {
                    echo "<h1>Hola " . $_SESSION["name"] . ", ets un " . $_SESSION["rol"] . "</h2>";
                    echo '<a style="color: red" href="idioma.php?lang=cat">Cat</a>';
                    echo ' ';
                    echo '<a href="idioma.php?lang=es">Es</a>';
                    echo ' ';
                    echo '<a href="idioma.php?lang=en">En</a>';
                    echo ' ';
                    echo '<a href="delete.php">Eliminar</a><br><br>';

                    echo '<a href="mostrarinfo.php?user_id=' . $_SESSION['user_id'] . '">Mostra informació</a>';
                    echo ' ';
                    echo '<a href="destruir.php">Desconnectar</a><br>';
                }
            } else if ($_COOKIE["lang"] == "es") {  
                if ($_SESSION["rol"] == "professorat") { 
                    echo "<h1>Hola " . $_SESSION["name"] . ", eres un profesor</h2>";
                    echo '<a href="idioma.php?lang=cat">Cat</a>';
                    echo ' ';
                    echo '<a style="color: red" href="idioma.php?lang=es">Es</a>';
                    echo ' ';
                    echo '<a href="idioma.php?lang=en">En</a>';
                    echo ' ';
                    echo '<a href="delete.php">Eliminar</a><br><br>';

                    echo '<a href="mostrarinfo.php?user_id=' . $_SESSION['user_id'] . '">Mostrar información</a>';
                    echo ' ';
                    echo '<a href="destruir.php">Desconectar</a><br><br>';
                    $queryquery = "SELECT * FROM `user` WHERE `rol` = 'professorat'";
                    $result = mysqli_query($conn, $queryquery);
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table>";
                        echo "<tr><th>Nombre</th><th>Apellido</th><th>Email</th></tr>";
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["surname"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                } else {
                    echo "<h1>Hola " . $_SESSION["name"] . ", eres un alumno</h2>";
                    echo '<a href="idioma.php?lang=cat">Cat</a>';
                    echo ' ';
                    echo '<a style="color: red" href="idioma.php?lang=es">Es</a>';
                    echo ' ';
                    echo '<a href="idioma.php?lang=en">En</a>';
                    echo ' ';
                    echo '<a href="delete.php">Eliminar</a><br><br>';

                    echo '<a href="mostrarinfo.php?user_id=' . $_SESSION['user_id'] . '">Mostrar información</a>';
                    echo ' ';
                    echo '<a href="destruir.php">Desconectar</a><br>';
                }
            } else if ($_COOKIE["lang"] == "en") { 
                if ($_SESSION["rol"] == "professorat") { 
                    echo "<h1>Hello " . $_SESSION["name"] . ", you are teacher</h2>";
                    echo '<a href="idioma.php?lang=cat">Cat</a>';
                    echo ' ';
                    echo '<a href="idioma.php?lang=es">Es</a>';
                    echo ' ';
                    echo '<a style="color: red" href="idioma.php?lang=en">En</a>';
                    echo ' ';
                    echo '<a href="delete.php">Delete</a><br><br>';

                    echo '<a href="mostrarinfo.php?user_id=' . $_SESSION['user_id'] . '">Show info</a>';
                    echo ' ';
                    echo '<a href="destruir.php">Disconnect</a><br><br>';
                    $queryquery = "SELECT * FROM `user` WHERE `rol` = 'professorat'";
                    $result = mysqli_query($conn, $queryquery);
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table>";
                        echo "<tr><th>Name</th><th>Surname</th><th>Email</th></tr>";
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["surname"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                } else {
                    echo "<h1>Hello " . $_SESSION["name"] . ", you are a student</h2>";
                    echo '<a href="idioma.php?lang=cat">Cat</a>';
                    echo ' ';
                    echo '<a href="idioma.php?lang=es">Es</a>';
                    echo ' ';
                    echo '<a style="color: red" href="idioma.php?lang=en">En</a>';
                    echo ' ';
                    echo '<a href="delete.php">Delete</a><br><br>';

                    echo '<a href="mostrarinfo.php?user_id=' . $_SESSION['user_id'] . '">Show info</a>';
                    echo ' ';
                    echo '<a href="destruir.php">Disconnect</a><br>';
                }
            } else {
                if ($_SESSION["rol"] == "professorat") { 
                    echo "<h1>Hola " . $_SESSION["name"] . ", ets un " . $_SESSION["rol"] . "</h2>";
                    echo '<a style="color: red" href="idioma.php?lang=cat">Cat</a>';
                    echo ' ';
                    echo '<a href="idioma.php?lang=es">Es</a>';
                    echo ' ';
                    echo '<a href="idioma.php?lang=en">En</a>';
                    echo ' ';
                    echo '<a href="delete.php">Eliminar</a><br><br>';

                    echo '<a href="mostrarinfo.php?user_id=' . $_SESSION['user_id'] . '">Mostra informació</a>';
                    echo ' ';
                    echo '<a href="destruir.php">Desconnectar</a><br><br>';
                    $queryquery = "SELECT * FROM `user` WHERE `rol` = 'professorat'";
                    $result = mysqli_query($conn, $queryquery);
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table>";
                        echo "<tr><th>Nom</th><th>Cognom</th><th>Email</th></tr>";
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["surname"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<h1>Hola " . $_SESSION["name"] . ", ets un " . $_SESSION["rol"] . "</h2>";
                        echo '<a style="color: red" href="idioma.php?lang=cat">Cat</a>';
                        echo ' ';
                        echo '<a href="idioma.php?lang=es">Es</a>';
                        echo ' ';
                        echo '<a href="idioma.php?lang=en">En</a>';
                        echo ' ';
                        echo '<a href="delete.php">Eliminar</a><br><br>';

                        echo '<a href="mostrarinfo.php?user_id=' . $_SESSION['user_id'] . '">Mostra informació</a>';
                        echo ' ';
                        echo '<a href="destruir.php">Desconnectar</a><br>';
                    }
                }
            } 
        } 
    }  
}catch(Exception $e){
    echo "Error: " - $e->getMessage();
} finally{
                //cerrar conexion
    mysqli_close($conn);
}

?>
</body>
</html>