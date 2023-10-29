<html>
    <h2>Informació detallada de l'usuari<br></h2>
<?php
//Se inicia sesion
session_start();

include "bdConf.php"; 

//Si el login es falso se redirige a la pagina del login
if($_SESSION['LoggedIn']==false){
    header('Location:login.html');
}else{
//Se guarda la variable user_id en un get para utilizarla en la url
$user_id=$_GET['user_id'];

try{
    $conn= mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
 //Se muestra la informacion del usuario que ha hecho sesion   
    if($conn){           
        $query= "SELECT * FROM `user` WHERE `user_id`=$user_id";
        $users= mysqli_query($conn, $query);
        if($users){
            $numero = mysqli_num_rows($users);
            if ($numero > 0) { 
                $us = mysqli_fetch_array($users);
                echo "Id usuari: " .$us['user_id']. "<br>";
                echo "Nom: " .$us['name']. "<br>";
                echo "Cognom: " .$us['surname']. "<br>";
                echo "Email: " .$us['email']. "<br>";
                echo "Rol: " .$us['rol']. "<br>";
                echo "Actiu: " .$us['active']. "<br>"; 
            }
        }
    }
}catch(Exception $e){
    echo "Error: " - $e->getMessage();
} finally{
    //cerrar conexion
    mysqli_close($conn);
}
}
?>
<!-- Se pone un link si quieres volver a la pagina del index -->
    <a href="index.php">TORNAR</a>
</html>
