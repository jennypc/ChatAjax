<?php 
include "db.php"
?>

<!DOCTYPE html>
<html>
<head>
    <title> </title>
</head>
<body>
    <?php
    if(isset($_POST['reglog'])){
        $usuario= $_POST['reguser'];
        $pass= md5($_POST['reguser']);
        
        $query = "select user from uruarios where user='$usuario'";
        $queryResult = sqlsrv_query($cnx, $query);
        
        $c= sqlsrv_num_rows($queryResult);
        if($c > 0){
            echo "Ya existe el nombre";
        }else {
            $s = "insert into uruarios (user, pass, rank, fecha) values ('$usuario', '$pass','1', now())";
            $sR = sqlsrv_query($cnx, $s);
            if ($sR){
                echo "Se ah registrado correctamente";
            }
        }
        
    }
    
    ?>
    <h1>Iniciar Sesion</h1>
    <form method="post" action="">
        <input type="text" name="loguser">
        <input type="password" name="logpass">
        <input type="submit" name="log" value="Ingresar">
    </form>
    
    <h1>Registrarme</h1>
    <form method="post" action="">
        <input type="text" name="reguser">
        <input type="password" name="regpass">
        <input type="submit" name="reglog" value="Registrarme">
    </form>

</body>
</html>