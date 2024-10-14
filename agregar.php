<html>
<head>
    <title>AGREGAR</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <?php
        if(isset($_POST['enviar'])){
            $nombre=$_POST['nombre'];
            $producto=$_POST['producto'];

            include("conexion.php");
            $sql="insert into proveedores(nombre,producto)
            values('".$nombre."','".$producto."')";

            $resultado=mysqli_query($conexion,$sql);

            if($resultado){
                echo " <script languaje='JavaScript'>
                        alert('Los datos fueron ingresados correctamente a la BD');
                        location.assign('index.php');
                        </script>";
            }
            else {
                " <script languaje='JavaScript'>
                        alert('ERROR: Los datos NO fueron ingresados a la BD');
                        location.assign('index.php');
                        </script>";
            }
            mysqli_close($conexion);

        }
        else {
    ?>
    <h1>Agregar nuevo proveedor</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <label>Nombre:</label>
    <input type="text" name="nombre"><br>
    <label>Producto</label>
    <input type="text" name="producto"><br>
    <input type="submit" name="enviar" value="AGREGAR">
    <a href="index.php">Regresar</a>
    </form>
    <?php
        }
    ?>
</body>

</html>