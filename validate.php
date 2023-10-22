<?php
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

        if($users){
            $numero = mysqli_num_rows($users);
            if ($numero > 0) {
                foreach($users as $us){
                    //Si el usuario és alumno
                    if($us['rol']=="alumnat"){
                        echo "Hola ". $us['name']. " ets alumne<br>";
                        echo "nom: ". $us['name']. "<br>";
                        echo "cognom: ". $us['surname']. "<br>";
                        echo "email: ". $us['email']. "<br>";
                    //Si el usuario és profesor
                    }else {
                        echo "Hola ". $us['name']. ", ets professor!!<br>"; 
                        echo "<br>La llista d'usuaris de la base de dades és:<br>";
                        // Select de tots els usuaris
                        $queryquery= "SELECT * FROM `user` WHERE `rol`= 'professorat'";
                        $todos= mysqli_query($conn, $queryquery);
                        foreach($todos as $alguno){
                        echo "<br>Nom i cognom: " . $alguno['name']." ". $alguno['surname']. "<br>";
                        }
                    }
                }   
            }else {
                //si no es un usuario y contraseña correcta
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
