<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>
        div{
            background-color: white;
            padding: 20px;
            border: 1px solid black;
            border-radius: 12px;
        }
    </style>
</head>
<body id="body">
    <div>
    <form method="post" action="index.php">
        <select name="color" id="">
            <?php
                require_once("connection.php");    
                $conexion = Db::getConnect();
                $stmt = $conexion->prepare("SELECT name FROM colores");
                $stmt->execute();
                $row = $stmt->fetchAll();
                foreach ($row as $a){
                    echo('<option value="'.$a['name'].'">'.$a['name'].'</option>');
                }
            ?>
        </select>
        <input type="submit" value="Introducir">
        
    </form>

    <?php
        function fondo($color) {
                require_once("connection.php");
                $conexion = Db::getConnect();
                $stmt = $conexion->prepare("SELECT rgb FROM colores WHERE name = :color");
                $stmt->bindValue(':color', $color);
                $stmt->execute();
                $row = $stmt->fetch();
                // echo(var_dump($row));
                $fondo = $row[0];
                //echo(var_dump($fondo));
                echo('<script> document.getElementById("body").style.backgroundColor = "rgb'.$fondo.'"</script>');
            }

        if (isset($_POST['color'])) {
            //echo("cookie introucida");
            if (isset($_COOKIE['color'])) {
                //empty($_COOKIE['color']);
                $_COOKIE['color'] = $_POST['color'];
            }else{
                setcookie("color", $_POST['color'], 0);
            }
            fondo($_POST['color']);
        }

        if (isset($_COOKIE['color'])) {
            echo("<p>El color del fondo es ".$_COOKIE['color']."</p>");
            fondo($_COOKIE['color']);
        }

    ?>
    </div>
</body>
</html>