<?php
//Se inicia sesion
session_start();   

//Unir la BD 
include "bdConf.php";

//Conectarse a la BD
$conn= mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);  

// Cuando la conexion es incorrecta
if (!$conn) {
    echo "Error de connexió " . mysqli_connect_error();
}

//Variables de los datos del formulario
$email=$_POST['email'];
$password=$_POST['psw'];

//Comprobar la conexión
try{
        // Para comprobar si existe el usuario
        $query= "SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'";
        $users= mysqli_query($conn, $query);
        //Se utiliza las variables de sesion per guardar o modificar informació que podrem consultar en altres pàgines
        if($users){
            $numero = mysqli_num_rows($users);
            if ($numero > 0) { 
                $us = mysqli_fetch_array($users);
                $_SESSION["LoggedIn"] = true;
                $_SESSION["name"] = $us["name"];
                $_SESSION["rol"] = $us["rol"];
                $_SESSION["user_id"] = $us["user_id"];
                //Se redirige al index
                header("Location:index.php");
            }else {
                //si es un usuario y contraseña incorrecto se redirige al login
                include 'login.html';
                echo "Els valors son incorrectes";
            }
        }else {
            //si no esta conectada la base de datos con la conexion
            echo "ERROR: " . $users . "<br>"  . mysqli_error($conn);
    }    
}catch(Exception $e){
    echo "Error: " - $e->getMessage();
} finally{
    //cerrar conexion
    mysqli_close($conn);
}
?>
