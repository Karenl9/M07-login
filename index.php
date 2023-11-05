<?php
//Se inicia sesion 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pàgina d'inici</title>
</head>
<body>
<!-- Se muestra la informacion de quien ha hecho sesion -->
    <h1>Hola <?php echo $_SESSION["name"]; ?>, ets un <?php echo $_SESSION["rol"]; ?></h1>
<!-- Se muestra el id del user_id en la url, con el get que utilizamos en el documento mostrarinfo.php -->
<!-- Y se ponen dos links, si quieres destruir la sesion o mostrarla -->
    <a href="mostrarinfo.php?user_id=<?php echo $_SESSION["user_id"]; ?>">Mostrar informació</a> 
    <a href="destruir.php">Desconnectar</a><br>
    <br>

<?php
//Si no hay sesion te redirige a la pagina del login
    if($_SESSION['LoggedIn']==false){
        header('Location:login.html');
    }else{
//Si es el rol profesor se pone una tabla con todos los profes y su informacion(su nombre, apellido y email)
    if ($_SESSION["rol"] == "professorat") { 
        include "bdConf.php";
        $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
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
            echo "No se encontraron usuarios con el rol 'professorat'.";
        }
    
        mysqli_close($conn);
    }
    }   
     
?>   
</body>
</html>
