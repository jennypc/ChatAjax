<?php 
  include "db.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Chat con PHP</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script type="text/javascript">
    function ajax (){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function(){
            if(req.readyState == 4 && req.status == 200){
                document.getElementById('chat').innerHTML = req.responseText;
            }
        }
        
        req.open('GET', 'chat.php', true);
        req.send();
    }
        //Linea que hace que se refresque la pagina a cada segundo 
        setInterval(function(){ajax();},1000);
    </script>
</head>
<body onload="ajax();">
    <div id="contenedor">
        <div id="caja-chat">
            <div id="chat"></div>
        </div>
        <form method="POST" action="index.php">
            <input type="text" name="nombre" placeholder="Ingresa tu nombre">
            <textarea name="mensaje" placeholder="Ingresa tu mensaje"></textarea>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        
        <?php
        if(isset($_POST['enviar'])){
            $nombre = $_POST['nombre'];
            $mensaje = $_POST['mensaje'];
            
            $consulta = "insert into chat (nombre, mensaje) values ('$nombre', '$mensaje')";
            $consultaResult = sqlsrv_query($cnx, $consulta);
             if(!$consultaResult)die( print_r(sqlsrv_errors(), true));
            
            if($consultaResult){
                echo "<enved loop='false' src='sonido.mp3' hidden='true' autoplay='true'>";
            }
        }
        
        ?>
        
    </div>
</body>
</html>