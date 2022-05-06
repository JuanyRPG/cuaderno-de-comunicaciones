<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
<?php
//recibimos los datos del formulario
$usuario =$_POST['usuario'];
$password = MD5($_POST['clave']);

// verificamos si ambas claves recibidas son iguales
if($password == $password_2 ){
    //conexion a bd
    $conexion = new mysqli('localhost','root','','bd_usuario');

    // en primer lugar verificamos si existe el email en la bd
    $buscar_email = "SELECT * FROM tbl_usuario WHERE email = '$email'";

    //ejecutamos la consulta
    $resultado = mysqli_query($conexion,$buscar_email);
    if($resultado->num_rows > 0){
        echo("<div class='alert alert-danger' role='alert'>Ya existe una cuenta con el email ingresado</div>");
    }
    else{
        $alta = "INSERT INTO tbl_usuario(password,usuario)VALUES('$password','$usuario')";
        $ejecutar_alta = mysqli_query($conexion,$alta);
        echo("<div class='alert alert-success' role='alert'>Se ha dado de alta exitosamente</div>");
    }
}
else{
    //mostramos mensaje de error si las contraseñas no coinciden
    echo("<div class='alert alert-danger' role='alert'>Las contraseñas no coinciden</div>");

    
     
    
}

?>
<a href='alta.html' class='btn btn-warning'>Volver</a>
  </div>  
</body>
</html>