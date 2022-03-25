<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        input{
            margin:15px;
        }
        body{
            margin: 25px;
        }
    </style>
</head>
<body>
    <H1>Contacto</H1>
    <form action="contacto.php" method="POST">
        <label>Nombre de empresa</label>
        <input type="text" name="empresa" />
        <label>Correo</label>
        <input type="email" name="correo" />
        <br>
        <label>Mensaje</label>
        <br>
        <textarea name="mensaje" id="" cols="30" rows="10"></textarea>
        <br>
        <label>Acepto la política de empresa</label>
        <input type="checkbox" required>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if(isset($_POST['empresa'])){
            require_once("connection.php");
            $conexion = Db::getConnect();
            $stmt = $conexion->prepare("INSERT INTO empresa (empresa, correo, mensaje) VALUES (:empresa, :correo, :mensaje)");
            $stmt->bindValue(':empresa',$_POST['empresa']);
            $stmt->bindValue(':correo',$_POST['correo']);
            $stmt->bindValue(':mensaje',$_POST['mensaje']);
            $stmt->execute();
            echo "<p>Contacto enviado!</p>";
        }

    ?>
</body>
</html>


